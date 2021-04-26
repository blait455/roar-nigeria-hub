<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use App\Slider;
use Carbon\Carbon;
use Toastr;


class SliderController extends Controller
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
        $sliders = Slider::latest()->get();

        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders.create');
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
            'title' => 'required|unique:sliders|max:255',
            'image' => 'required|mimes:jpeg,jpg,png'
        ]);

        $image = $request->file('image');
        $slug  = Str::slug($request->title);

        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('slider')){
                Storage::disk('public')->makeDirectory('slider');
            }
            $slider = Image::make($image)->resize(1920, 795)->save();
            Storage::disk('public')->put('slider/'.$imagename, $slider);
        }else{
            $imagename = 'default.png';
        }

        $slider = new Slider();
        $slider->title = $request->title;
        $slider->link = $request->link;
        $slider->v_link = $request->v_link;
        $slider->btn_text = $request->btn_text;
        $slider->description = $request->description;
        $slider->image = $imagename;
        $slider->save();

        Toastr::success('message', 'Slider created successfully.');
        return redirect()->route('admin.sliders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);

        return view('admin.sliders.edit', compact('slider'));
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
            'title' => 'required|max:255',
            'image' => 'mimes:jpeg,jpg,png'
        ]);

        $image = $request->file('image');
        $slug  = Str::slug($request->title);
        $slider = Slider::find($id);

        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('slider')){
                Storage::disk('public')->makeDirectory('slider');
            }
            if(Storage::disk('public')->exists('slider/'.$slider->image)){
                Storage::disk('public')->delete('slider/'.$slider->image);
            }
            $sliderimg = Image::make($image)->resize(1920, 795)->save();
            Storage::disk('public')->put('slider/'.$imagename, $sliderimg);
        }else{
            $imagename = $slider->image;
        }

        $slider->title = $request->title;
        $slider->link = $request->link;
        $slider->v_link = $request->v_link;
        $slider->btn_text = $request->btn_text;
        $slider->description = $request->description;
        $slider->image = $imagename;
        $slider->save();

        Toastr::success('message', 'Slider updated successfully.');
        return redirect()->route('admin.sliders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);

        if(Storage::disk('public')->exists('slider/'.$slider->image)){
            Storage::disk('public')->delete('slider/'.$slider->image);
        }

        $slider->delete();

        Toastr::success('message', 'Slider deleted successfully.');
        return back();
    }
}
