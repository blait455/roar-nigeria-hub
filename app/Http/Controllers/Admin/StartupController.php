<?php

namespace App\Http\Controllers\Admin;

use App\Aspect;
use App\Http\Controllers\Controller;
use App\Startup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Toastr;

class StartupController extends Controller
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
        $startups = Startup::latest()->get();

        return view('admin.startups.index', compact('startups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aspects = Aspect::all();

        return view('admin.startups.create', compact('aspects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required',
            // 'idea' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png',
            'description' => 'required|max:200'
        ]);

        $image = $request->file('image');
        $logo = $request->file('logo');
        $slug  = Str::slug($request->name);

        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('startups')){
                Storage::disk('public')->makeDirectory('startups');
                Storage::disk('public')->makeDirectory('startups/front');
            }
            $startup = Image::make($image)->resize(1600, 1000)->save();
            Storage::disk('public')->put('startups/'.$imagename, $startup);

            // Frontend
            $fstartup = Image::make($image)->resize(1000, 1000)->save();
            Storage::disk('public')->put('startups/front/'.$imagename, $fstartup);
        }else{
            $imagename = 'default.png';
        }

        if(isset($logo)){
            $currentDate = Carbon::now()->toDateString();
            $logoname = $slug.'-logo-'.$currentDate.'-'.uniqid().'.'.$logo->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('startups')){
                Storage::disk('public')->makeDirectory('startups');
            }
            $startuplogo = Image::make($logo)->resize(400, 100)->save();
            Storage::disk('public')->put('startups/'.$logoname, $startuplogo);
        }else{
            $logoname = 'default.png';
        }

        $startup = new Startup();
        $startup->aspect_id = $request->aspect_id;
        $startup->name = $request->name;
        $startup->phone = $request->phone;
        $startup->email = $request->email;
        $startup->status = $request->status;
        $startup->idea = $request->idea;
        $startup->description = $request->description;
        $startup->image = $imagename;
        $startup->logo = $logoname;
        $startup->save();

        Toastr::success('message', 'Startup created successfully.');
        return redirect()->route('admin.startup.index');
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
        $startup = Startup::find($id);
        $aspects = Aspect::all();

        return view('admin.startups.edit', compact('startup', 'aspects'));
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
            'name' => 'required',
            'idea' => 'required',
            'image' => 'mimes:jpeg,jpg,png',
            'description' => 'required|max:200',
        ]);

        $image = $request->file('image');
        $logo = $request->file('logo');
        $slug  = Str::slug($request->name);
        $startup = Startup::find($id);

        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('startups')){
                Storage::disk('public')->makeDirectory('startups');
                Storage::disk('public')->makeDirectory('startups/front');
            }
            if(Storage::disk('public')->exists('startups/'.$startup->image)){
                Storage::disk('public')->delete('startups/'.$startup->image);
            }
            if(Storage::disk('public')->exists('startups/front/'.$startup->image)){
                Storage::disk('public')->delete('startups/front/'.$startup->image);
            }
            $startupimg = Image::make($image)->resize(1600, 1000)->save();
            Storage::disk('public')->put('startups/'.$imagename, $startupimg);

            // Frontend
            $fstartupimg = Image::make($image)->resize(1000, 1000)->save();
            Storage::disk('public')->put('startups/front/'.$imagename, $fstartupimg);
        }else{
            $imagename = $startup->image;
        }

        if(isset($logo)){
            $currentDate = Carbon::now()->toDateString();
            $logoname = $slug.'-'.$currentDate.'-'.uniqid().'.'.$logo->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('startups')){
                Storage::disk('public')->makeDirectory('startups');
            }
            if(Storage::disk('public')->exists('startups/'.$startup->logo)){
                Storage::disk('public')->delete('startups/'.$startup->logo);
            }
            $startuplogo = Image::make($logo)->resize(400, 100)->save();
            Storage::disk('public')->put('startups/'.$logoname, $startuplogo);
        }else{
            $logoname = $startup->logo;
        }

        $startup->aspect_id = $request->aspect_id;
        $startup->name = $request->name;
        $startup->phone = $request->phone;
        $startup->email = $request->email;
        $startup->status = $request->status;
        $startup->idea = $request->idea;
        $startup->description = $request->description;
        $startup->image = $imagename;
        $startup->logo = $logoname;
        $startup->update();

        Toastr::success('message', 'Startup updated successfully.');
        return redirect()->route('admin.startup.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $startup = Startup::find($id);

        if(Storage::disk('public')->exists('startups/'.$startup->image)){
            Storage::disk('public')->delete('startups/'.$startup->image);
        }
        if(Storage::disk('public')->exists('startups/front/'.$startup->image)){
            Storage::disk('public')->delete('startups/front/'.$startup->image);
        }
        if(Storage::disk('public')->exists('startups/'.$startup->logo)){
            Storage::disk('public')->delete('startups/'.$startup->logo);
        }

        $startup->delete();

        Toastr::success('message', 'Startup deleted successfully.');
        return back();
    }
}
