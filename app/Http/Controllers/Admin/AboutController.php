<?php

namespace App\Http\Controllers\Admin;

use App\About;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Toastr;

class AboutController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = DB::table('abouts')->first();

        return view('admin.about.edit', compact('about'));
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
            'image' => 'mimes:jpeg,jpg,png',
            'image1_3' => 'mimes:jpeg,jpg,png',
            'image2_3' => 'mimes:jpeg,jpg,png',
            'image3_3' => 'mimes:jpeg,jpg,png',
            'content' => 'required',
        ]);

        $image = $request->file('image');
        $image1_3 = $request->file('image1_3');
        $image2_3 = $request->file('image2_3');
        $image3_3 = $request->file('image3_3');
        $slug  = Str::slug('Roar nigeria hub');
        $about = About::where('id', 1)->first();

        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('about')){
                Storage::disk('public')->makeDirectory('about');
            }
            if(Storage::disk('public')->exists('about/'.$about->image)){
                Storage::disk('public')->delete('about/'.$about->image);
            }
            $aboutimg = Image::make($image)->resize(654, 654)->save();
            Storage::disk('public')->put('about/'.$imagename, $aboutimg);
        }else{
            $imagename = $about->image;
        }

        // for image1_3
        if(isset($image1_3)){
            $currentDate = Carbon::now()->toDateString();
            $image1_3name = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image1_3->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('about')){
                Storage::disk('public')->makeDirectory('about');
            }
            if(Storage::disk('public')->exists('about/'.$about->image1_3)){
                Storage::disk('public')->delete('about/'.$about->image1_3);
            }
            $aboutimg1_3 = Image::make($image1_3)->resize(274, 374)->save();
            Storage::disk('public')->put('about/'.$image1_3name, $aboutimg1_3);
        }else{
            $image1_3name = $about->image1_3;
        }

        // for image2_3
        if(isset($image2_3)){
            $currentDate = Carbon::now()->toDateString();
            $image2_3name = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image2_3->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('about')){
                Storage::disk('public')->makeDirectory('about');
            }
            if(Storage::disk('public')->exists('about/'.$about->image2_3)){
                Storage::disk('public')->delete('about/'.$about->image2_3);
            }
            $aboutimg2_3 = Image::make($image2_3)->resize(465, 452)->save();
            Storage::disk('public')->put('about/'.$image2_3name, $aboutimg2_3);
        }else{
            $image2_3name = $about->image2_3;
        }

        // for image3_3
        if(isset($image3_3)){
            $currentDate = Carbon::now()->toDateString();
            $image3_3name = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image3_3->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('about')){
                Storage::disk('public')->makeDirectory('about');
            }
            if(Storage::disk('public')->exists('about/'.$about->image3_3)){
                Storage::disk('public')->delete('about/'.$about->image3_3);
            }
            $aboutimg3_3 = Image::make($image3_3)->resize(411, 252)->save();
            Storage::disk('public')->put('about/'.$image3_3name, $aboutimg3_3);
        }else{
            $image3_3name = $about->image3_3;
        }

        $about->content = $request->content;
        $about->image = $imagename;
        $about->image1_3 = $image1_3name;
        $about->image2_3 = $image2_3name;
        $about->image3_3 = $image3_3name;

        $about->save();

        Toastr::success('message', 'about section updated successfully.');
        return redirect()->route('admin.about.index');
    }
}
