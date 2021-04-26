<?php

namespace App\Http\Controllers\Admin;

use App\Background;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Toastr;


class BackgroundController extends Controller
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
        $background = DB::table('backgrounds')->first();

        return view('admin.backgrounds.edit', compact('background'));
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
            'f1_bg' => 'mimes:jpeg,jpg,png',
            'f2_bg' => 'mimes:jpeg,jpg,png',
            'f3_bg' => 'mimes:jpeg,jpg,png',
            'f4_bg' => 'mimes:jpeg,jpg,png',
            'f5_bg' => 'mimes:jpeg,jpg,png',
            'a1_bg' => 'mimes:jpeg,jpg,png',
            'a2_bg' => 'mimes:jpeg,jpg,png',
            'b1_bg' => 'mimes:jpeg,jpg,png',
            'b2_bg' => 'mimes:jpeg,jpg,png',
            'c_bg' => 'mimes:jpeg,jpg,png',
            'e1_bg' => 'mimes:jpeg,jpg,png',
            'e2_bg' => 'mimes:jpeg,jpg,png',
            's1_bg' => 'mimes:jpeg,jpg,png',
            's2_bg' => 'mimes:jpeg,jpg,png',
        ]);

        $f1_bg = $request->file('f1_bg');
        $f2_bg = $request->file('f2_bg');
        $f3_bg = $request->file('f3_bg');
        $f4_bg = $request->file('f4_bg');
        $f5_bg = $request->file('f5_bg');
        $a1_bg = $request->file('a1_bg');
        $a2_bg = $request->file('a2_bg');
        $b1_bg = $request->file('b1_bg');
        $b2_bg = $request->file('b2_bg');
        $c_bg  = $request->file('c_bg');
        $e1_bg = $request->file('e1_bg');
        $e2_bg = $request->file('e2_bg');
        $s1_bg = $request->file('s1_bg');
        $s2_bg = $request->file('s2_bg');

        $slug  = Str::slug('Roar nigeria hub');
        // $background = DB::table('backgrounds')->first();
        $background = Background::where('id', 1)->first();
        // dd($background->f4_bg);

        if(isset($f4_bg)){
            $currentDate = Carbon::now()->toDateString();
            $f4_bgname = $slug.'-'.$currentDate.'-'.uniqid().'.'.$f4_bg->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('background')){
                Storage::disk('public')->makeDirectory('background');
            }
            if(Storage::disk('public')->exists('background/'.$background->f4_bg)){
                Storage::disk('public')->delete('background/'.$background->f4_bg);
            }
            $f4_bgimg = Image::make($f4_bg)->resize(575, 605)->save();
            Storage::disk('public')->put('background/'.$f4_bgname, $f4_bgimg);
        }else{
            $f4_bgname = $background->f4_bg;
        }

        // for f1_bg
        if(isset($f1_bg)){
            $currentDate = Carbon::now()->toDateString();
            $f1_bgname = $slug.'-'.$currentDate.'-'.uniqid().'.'.$f1_bg->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('background')){
                Storage::disk('public')->makeDirectory('background');
            }
            if(Storage::disk('public')->exists('background/'.$background->f1_bg)){
                Storage::disk('public')->delete('background/'.$background->f1_bg);
            }
            $f1_bgimg = Image::make($f1_bg)->resize(1920, 720)->save();
            Storage::disk('public')->put('background/'.$f1_bgname, $f1_bgimg);
        }else{
            $f1_bgname = $background->f1_bg;
        }

        // for f2_bg
        if(isset($f2_bg)){
            $currentDate = Carbon::now()->toDateString();
            $f2_bgname = $slug.'-'.$currentDate.'-'.uniqid().'.'.$f2_bg->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('background')){
                Storage::disk('public')->makeDirectory('background');
            }
            if(Storage::disk('public')->exists('background/'.$background->f2_bg)){
                Storage::disk('public')->delete('background/'.$background->f2_bg);
            }
            $f2_bgimg = Image::make($f2_bg)->resize(1920, 1060)->save();
            Storage::disk('public')->put('background/'.$f2_bgname, $f2_bgimg);
        }else{
            $f2_bgname = $background->f2_bg;
        }

        // for f3_bg
        if(isset($f3_bg)){
            $currentDate = Carbon::now()->toDateString();
            $f3_bgname = $slug.'-'.$currentDate.'-'.uniqid().'.'.$f3_bg->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('background')){
                Storage::disk('public')->makeDirectory('background');
            }
            if(Storage::disk('public')->exists('background/'.$background->f3_bg)){
                Storage::disk('public')->delete('background/'.$background->f3_bg);
            }
            $f3_bgimg = Image::make($f3_bg)->resize(500, 610)->save();
            Storage::disk('public')->put('background/'.$f3_bgname, $f3_bgimg);
        }else{
            $f3_bgname = $background->f3_bg;
        }

        // for f5_bg
        if(isset($f5_bg)){
            $currentDate = Carbon::now()->toDateString();
            $f5_bgname = $slug.'-'.$currentDate.'-'.uniqid().'.'.$f5_bg->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('background')){
                Storage::disk('public')->makeDirectory('background');
            }
            if(Storage::disk('public')->exists('background/'.$background->f5_bg)){
                Storage::disk('public')->delete('background/'.$background->f5_bg);
            }
            $f5_bgimg = Image::make($f5_bg)->resize(2500, 521)->save();
            Storage::disk('public')->put('background/'.$f5_bgname, $f5_bgimg);
        }else{
            $f5_bgname = $background->f5_bg;
        }

        // for a1_bg
        if(isset($a1_bg)){
            $currentDate = Carbon::now()->toDateString();
            $a1_bgname = $slug.'-'.$currentDate.'-'.uniqid().'.'.$a1_bg->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('background')){
                Storage::disk('public')->makeDirectory('background');
            }
            if(Storage::disk('public')->exists('background/'.$background->a1_bg)){
                Storage::disk('public')->delete('background/'.$background->a1_bg);
            }
            $a1_bgimg = Image::make($a1_bg)->resize(1920, 550)->save();
            Storage::disk('public')->put('background/'.$a1_bgname, $a1_bgimg);
        }else{
            $a1_bgname = $background->a1_bg;
        }

        // for a2_bg
        if(isset($a2_bg)){
            $currentDate = Carbon::now()->toDateString();
            $a2_bgname = $slug.'-'.$currentDate.'-'.uniqid().'.'.$a2_bg->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('background')){
                Storage::disk('public')->makeDirectory('background');
            }
            if(Storage::disk('public')->exists('background/'.$background->a2_bg)){
                Storage::disk('public')->delete('background/'.$background->a2_bg);
            }
            $a2_bgimg = Image::make($a2_bg)->resize(1920, 1060)->save();
            Storage::disk('public')->put('background/'.$a2_bgname, $a2_bgimg);
        }else{
            $a2_bgname = $background->a2_bg;
        }

        // for b1_bg
        if(isset($b1_bg)){
            $currentDate = Carbon::now()->toDateString();
            $b1_bgname = $slug.'-'.$currentDate.'-'.uniqid().'.'.$b1_bg->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('background')){
                Storage::disk('public')->makeDirectory('background');
            }
            if(Storage::disk('public')->exists('background/'.$background->b1_bg)){
                Storage::disk('public')->delete('background/'.$background->b1_bg);
            }
            $b1_bgimg = Image::make($b1_bg)->resize(1920, 550)->save();
            Storage::disk('public')->put('background/'.$b1_bgname, $b1_bgimg);
        }else{
            $b1_bgname = $background->b1_bg;
        }

        // for b2_bg
        if(isset($b2_bg)){
            $currentDate = Carbon::now()->toDateString();
            $b2_bgname = $slug.'-'.$currentDate.'-'.uniqid().'.'.$b2_bg->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('background')){
                Storage::disk('public')->makeDirectory('background');
            }
            if(Storage::disk('public')->exists('background/'.$background->b2_bg)){
                Storage::disk('public')->delete('background/'.$background->b2_bg);
            }
            $b2_bgimg = Image::make($b2_bg)->resize(1920, 550)->save();
            Storage::disk('public')->put('background/'.$b2_bgname, $b2_bgimg);
        }else{
            $b2_bgname = $background->b2_bg;
        }

        // for c_bg
        if(isset($c_bg)){
            $currentDate = Carbon::now()->toDateString();
            $c_bgname = $slug.'-'.$currentDate.'-'.uniqid().'.'.$c_bg->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('background')){
                Storage::disk('public')->makeDirectory('background');
            }
            if(Storage::disk('public')->exists('background/'.$background->c_bg)){
                Storage::disk('public')->delete('background/'.$background->c_bg);
            }
            $c_bgimg = Image::make($c_bg)->resize(1920, 550)->save();
            Storage::disk('public')->put('background/'.$c_bgname, $c_bgimg);
        }else{
            $c_bgname = $background->c_bg;
        }

        // for e1_bg
        if(isset($e1_bg)){
            $currentDate = Carbon::now()->toDateString();
            $e1_bgname = $slug.'-'.$currentDate.'-'.uniqid().'.'.$e1_bg->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('background')){
                Storage::disk('public')->makeDirectory('background');
            }
            if(Storage::disk('public')->exists('background/'.$background->e1_bg)){
                Storage::disk('public')->delete('background/'.$background->e1_bg);
            }
            $e1_bgimg = Image::make($e1_bg)->resize(1920, 550)->save();
            Storage::disk('public')->put('background/'.$e1_bgname, $e1_bgimg);
        }else{
            $e1_bgname = $background->e1_bg;
        }

        // for e2_bg
        if(isset($e2_bg)){
            $currentDate = Carbon::now()->toDateString();
            $e2_bgname = $slug.'-'.$currentDate.'-'.uniqid().'.'.$e2_bg->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('background')){
                Storage::disk('public')->makeDirectory('background');
            }
            if(Storage::disk('public')->exists('background/'.$background->e2_bg)){
                Storage::disk('public')->delete('background/'.$background->e2_bg);
            }
            $e2_bgimg = Image::make($e2_bg)->resize(1920, 550)->save();
            Storage::disk('public')->put('background/'.$e2_bgname, $e2_bgimg);
        }else{
            $e2_bgname = $background->e2_bg;
        }

        // for s1_bg
        if(isset($s1_bg)){
            $currentDate = Carbon::now()->toDateString();
            $s1_bgname = $slug.'-'.$currentDate.'-'.uniqid().'.'.$s1_bg->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('background')){
                Storage::disk('public')->makeDirectory('background');
            }
            if(Storage::disk('public')->exists('background/'.$background->s1_bg)){
                Storage::disk('public')->delete('background/'.$background->s1_bg);
            }
            $s1_bgimg = Image::make($s1_bg)->resize(1920, 550)->save();
            Storage::disk('public')->put('background/'.$s1_bgname, $s1_bgimg);
        }else{
            $s1_bgname = $background->s1_bg;
        }

        // for s2_bg
        if(isset($s2_bg)){
            $currentDate = Carbon::now()->toDateString();
            $s2_bgname = $slug.'-'.$currentDate.'-'.uniqid().'.'.$s2_bg->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('background')){
                Storage::disk('public')->makeDirectory('background');
            }
            if(Storage::disk('public')->exists('background/'.$background->s2_bg)){
                Storage::disk('public')->delete('background/'.$background->s2_bg);
            }
            $s2_bgimg = Image::make($s2_bg)->resize(1920, 550)->save();
            Storage::disk('public')->put('background/'.$s2_bgname, $s2_bgimg);
        }else{
            $s2_bgname = $background->s2_bg;
        }

        $background->f1_bg = $f1_bgname;
        $background->f2_bg = $f2_bgname;
        $background->f3_bg = $f3_bgname;
        $background->f4_bg = $f4_bgname;
        $background->f5_bg = $f5_bgname;
        $background->a1_bg = $a1_bgname;
        $background->a2_bg = $a2_bgname;
        $background->b1_bg = $b1_bgname;
        $background->b2_bg = $b2_bgname;
        $background->c_bg  = $c_bgname;
        $background->e1_bg = $e1_bgname;
        $background->e2_bg = $e2_bgname;
        $background->s1_bg = $s1_bgname;
        $background->s2_bg = $s2_bgname;

        $background->update();

        Toastr::success('message', 'Backgrounds  updated successfully.');
        return redirect()->route('admin.background.index');
    }
}
