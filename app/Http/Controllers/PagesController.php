<?php

namespace App\Http\Controllers;

use App\About;
use App\Aspect;
use App\Blait;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;
use Illuminate\Support\Str;

// use App\Property;
use App\Message;
use App\Gallery;
use App\Comment;
use App\Community;
use App\Contact as AppContact;
use App\Event;
use App\Incubation;
use App\Management;
// use App\Rating;
use App\Post;
use App\Startup;
use App\TeamMembers;
use App\User;

use Carbon\Carbon;
use Auth;
use DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class PagesController extends Controller
{
    // ABOUT-US PAGE
    public function aboutUs(){
        $about = About::first();
        $team = Management::all();
        return view('frontend.pages.about', compact('about', 'team'));
    }

    public function member($id){
        $member = Management::find($id);
        return view('frontend.pages.member', compact('member'));
    }

    // EVENTS PAGE
    public function events(){
        $events = Event::all();

        return view('frontend.pages.events', compact('events'));
    }

    // EVENTS DETAILS PAGE
    public function event($id){
        $event = Event::find($id);

        return view('frontend.pages.event', compact('event'));
    }

    // STARTUPS PAGE
    public function startups(){
        $startups = Startup::all();

        return view('frontend.pages.startups', compact('startups'));
    }

    // STARTUPS DETAILS PAGE
    public function startup($id){
        $startup = Startup::find($id);

        return view('frontend.pages.startup', compact('startup'));
    }

    // BLOG PAGE
    public function blog()
    {
        $month = request('month');
        $year  = request('year');
        $posts = Post::latest()->withCount('comments')->where('status',1)->paginate(10);
        $latest_posts = Post::where('status','1')->orderBy('id','DESC')->limit(3)->get();
// dd($posts);

        return view('frontend.pages.blog', compact('posts', 'latest_posts'));
    }

    public function blogshow($slug)
    {
        $post = Post::with('comments')->withCount('comments')->where('slug', $slug)->first();

        $blogkey = 'blog-' . $post->id;
        if(!Session::has($blogkey)){
            $post->increment('view_count');
            Session::put($blogkey,1);
        }
        $latest_posts = Post::where('status','1')->orderBy('id','DESC')->limit(3)->get();
        $categories   = Category::has('posts')->withCount('posts')->get();

        return view('frontend.pages.blog-single', compact('post', 'latest_posts', 'categories'));
    }


    // BLOG COMMENT
    public function blogComments(Request $request, $id)
    {
        $request->validate([
            'body'  => 'required'
        ]);

        $post = Post::find($id);

        $post->comments()->create(
            [
                'user_id'   => Auth::id(),
                'body'      => $request->body,
                'parent'    => $request->parent,
                'parent_id' => $request->parent_id
            ]
        );

        return back();
    }


    // BLOG CATEGORIES
    public function blogCategories()
    {
        $posts = Post::latest()->withCount(['comments','categories'])
                                ->whereHas('categories', function($query){
                                    $query->where('categories.slug', '=', request('slug'));
                                })
                                ->where('status',1)
                                ->paginate(10);

        return view('frontend.pages.blog', compact('posts'));
    }

    // BLOG TAGS
    public function blogTags()
    {
        $posts = Post::latest()->withCount('comments')
                                ->whereHas('tags', function($query){
                                    $query->where('tags.slug', '=', request('slug'));
                                })
                                ->where('status',1)
                                ->paginate(10);

        return view('pages.blog.index', compact('posts'));
    }

    // BLOG AUTHOR
    public function blogAuthor()
    {
        $posts = Post::latest()->withCount('comments')
                                ->whereHas('user', function($query){
                                    $query->where('username', '=', request('username'));
                                })
                                ->where('status',1)
                                ->paginate(10);

        return view('pages.blog.index', compact('posts'));
    }

    // BLOG SEARCH
    public function blogSearch(Request $request){
        dd($request);
        $rcnt_post = Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        $posts = Post::orwhere('title','like','%'.$request->search.'%')
            ->orwhere('body','like','%'.$request->search.'%')
            ->orwhere('slug','like','%'.$request->search.'%')
            ->orderBy('id','DESC')
            ->paginate(8);
        return view('frontend.pages.blog', compact('latest_posts', 'posts'));
    }

    // MESSAGE TO AGENT (SINGLE AGENT PAGE)
    public function messageAgent(Request $request)
    {
        $request->validate([
            'agent_id'  => 'required',
            'name'      => 'required',
            'email'     => 'required',
            'phone'     => 'required',
            'message'   => 'required'
        ]);

        Message::create($request->all());

        if($request->ajax()){
            return response()->json(['message' => 'Message send successfully.']);
        }

    }


    // CONATCT PAGE
    public function contact(){
        return view('frontend.pages.contact');
    }

    public function contactStore(Request $request)
    {
        // dd($request);

        $request->validate([
            'name'      => 'required',
            'email'     => 'required',
            'phone'     => 'required',
            'message'   => 'required'
        ]);

        $message  = $request->message;
        $mailfrom = $request->email;

        AppContact::create([
            'name'      => $request->name,
            'email'     => $mailfrom,
            'phone'     => $request->phone,
            'subject'     => $request->subject,
            'message'   => $message
        ]);

        // $adminname  = User::find(1)->name;
        // $mailto     = $request->mailto;

        // Mail::to($mailto)->send(new Contact($message,$adminname,$mailfrom));

        if($request->ajax()){
            return response()->json(['message' => 'Message send successfully.']);
        }

        return redirect()->back();
    }

    public function contactMail(Request $request)
    {
        return $request->all();
    }

    // APPLICATIONS
    public function incubation(){
        $aspects = Aspect::all();

        return view('frontend.pages.applications.incubation', compact('aspects'));
    }

    public function incubationStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $startup = new Incubation();
        $startup->aspect_id         = $request->aspect_id;
        $startup->name              = $request->name;
        $startup->phone             = $request->phone;
        $startup->email             = $request->email;
        $startup->idea_duration     = $request->idea_duration;
        $startup->motivation        = $request->motivation;
        $startup->medium_aware      = $request->medium_aware;
        $startup->problem           = $request->problem;
        $startup->type              = $request->type;
        $startup->age               = $request->age;
        $startup->fav_color         = $request->fav_color;
        $startup->course            = $request->course;
        $startup->fav_subject       = $request->fav_subject;
        $startup->biz_experience    = $request->biz_experience;
        $startup->save();

        for ($i=0; $i < count($request->tname); $i++) {
            if (isset($request->temail[$i]) && isset($request->tphone[$i]) && isset($request->tskill[$i])) {
                TeamMembers::create([
                    'incubation_id'     =>  $startup->id,
                    'name'              =>  $request->tname[$i],
                    'email'             =>  $request->temail[$i],
                    'phone'             =>  $request->tphone[$i],
                    'skill'             =>  $request->tskill[$i],
                ]);
            }
        }


        return view('frontend.pages.applications.success');
    }

    public function wdts(){
        $aspect = Aspect::all();

        return view('frontend.pages.applications.roar_blait', compact('aspect'));
    }

    public function wdtsStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $image = $request->file('pop');
        $slug  = Str::slug($request->name);

        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('blait/wdts')){
                Storage::disk('public')->makeDirectory('blait/wdts');
            }
            $team = Image::make($image)->stream();
            Storage::disk('public')->put('blait/wdts/'.$imagename, $team);
        }else{
            $imagename = 'default.png';
        }

        $student = new Blait();
        $student->name              = $request->name;
        $student->phone             = $request->phone;
        $student->email             = $request->email;
        $student->size              = $request->size;
        $student->pop               = $imagename;
        $student->save();

        return view('frontend.pages.applications.success');
    }

    public function rtc(){
        return view('frontend.pages.applications.roar_tc');
    }

    public function rtcStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $student = new Community();
        $student->name              = $request->name;
        $student->phone             = $request->phone;
        $student->email             = $request->email;
        $student->dept              = $request->dept;
        $student->field             = $request->field;
        $student->level             = $request->level;
        $student->save();

        return view('frontend.pages.applications.success');
    }

    // GALLERY PAGE
    public function gallery()
    {
        $galleries = Gallery::latest()->paginate(12);

        return view('pages.gallery',compact('galleries'));
    }
}
