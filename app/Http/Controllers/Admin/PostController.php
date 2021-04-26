<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;
use App\Comment;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Toastr;
use Auth;

class PostController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->withCount('comments')->get();

        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required|unique:posts|max:255',
            'image'     => 'required|mimes:jpeg,jpg,png',
            'categories'=> 'required',
            'tags'      => 'required',
            'body'      => 'required'
        ]);

        $image = $request->file('image');
        $slug  = Str::slug($request->title);

        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('posts')){
                Storage::disk('public')->makeDirectory('posts');
                Storage::disk('public')->makeDirectory('posts/front');
            }
            $postimage = Image::make($image)->resize(1600, 980)->save();
            Storage::disk('public')->put('posts/'.$imagename, $postimage);

            // Front page
            $fpostimage = Image::make($image)->resize(1000, 1000)->save();
            Storage::disk('public')->put('posts/front/'.$imagename, $fpostimage);

        }else{
            $imagename = 'default.png';
        }

        $post = new Post();
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->slug = $slug;
        $post->image = $imagename;
        $post->body = $request->body;
        if(isset($request->status)){
            $post->status = true;
        }
        $post->is_approved = true;
        $post->save();

        $post->categories()->attach($request->categories);
        $post->tags()->attach($request->tags);

        Toastr::success('message', 'Post created successfully.');
        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::withCount('comments')->find($id);

        return view('admin.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $post = Post::find($id);

        $selectedtag = $post->tags->pluck('id');

        return view('admin.posts.edit',compact('categories','tags','post','selectedtag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'     => 'required|max:255',
            // 'image'     => 'mimes:jpeg,jpg,png',
            'categories'=> 'required',
            'tags'      => 'required',
            'body'      => 'required'
        ]);

        $image = $request->file('image');
        $slug  = Str::slug($request->title);
        // dd($id);

        $post = Post::find($id)->first();


        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('posts')){
                Storage::disk('public')->makeDirectory('posts');
                Storage::disk('public')->makeDirectory('posts/front');
            }
            if(Storage::disk('public')->exists('posts/'.$post->image)){
                Storage::disk('public')->delete('posts/'.$post->image);
            }

            if(Storage::disk('public')->exists('posts/front/'.$post->image)){
                Storage::disk('public')->delete('posts/front/'.$post->image);
            }

            $postimage = Image::make($image)->resize(1600, 980)->save();
            Storage::disk('public')->put('posts/'.$imagename, $postimage);

            $fpostimage = Image::make($image)->resize(1000, 1000)->save();
            Storage::disk('public')->put('posts/front/'.$imagename, $fpostimage);

        }else{
            $imagename = $post->image;
        }

        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->slug = $slug;
        $post->image = $imagename;
        $post->body = $request->body;
        if(isset($request->status)){
            $post->status = true;
        }else{
            $post->status = false;
        }
        $post->is_approved = true;
        $post->save();

        $post->categories()->sync($request->categories);
        $post->tags()->sync($request->tags);

        Toastr::success('message', 'Post updated successfully.');
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if(Storage::disk('public')->exists('posts/'.$post->image)){
            Storage::disk('public')->delete('posts/'.$post->image);
        }
        if(Storage::disk('public')->exists('posts/front'.$post->image)){
            Storage::disk('public')->delete('posts/front'.$post->image);
        }

        $post->delete();
        $post->categories()->detach();
        $post->tags()->detach();
        $post->comments()->delete();

        Toastr::success('message', 'Post deleted successfully.');
        return back();
    }
}
