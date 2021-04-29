<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Management;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Toastr;


class ManagementController extends Controller
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
        $team = Management::all();

        return view('admin.team.index', compact('team'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.team.create');
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
            'name' => 'required',
            'position' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png',
            'description' => 'required'
        ]);

        $image = $request->file('image');
        $slug  = Str::slug($request->name);

        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('team')){
                Storage::disk('public')->makeDirectory('team');
            }
            $team = Image::make($image)->resize(768, 768)->save();
            Storage::disk('public')->put('team/'.$imagename, $team);
        }else{
            $imagename = 'default.png';
        }

        $team = new Management();
        $team->name             = $request->name;
        $team->email         = $request->email;
        $team->phone         = $request->phone;
        $team->bio         = $request->bio;
        $team->position     = $request->position;
        $team->description  = $request->description;
        $team->facebook     = $request->facebook;
        $team->instagram    = $request->instagram;
        $team->twitter      = $request->twitter;
        $team->linkedin     = $request->linkedin;
        $team->image        = $imagename;
        $team->save();

        Toastr::success('message', 'Management team member created successfully.');
        return redirect()->route('admin.team.index');
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
        $team = Management::find($id);

        return view('admin.team.edit', compact('team'));
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
            'position' => 'required',
            'image' => 'mimes:jpeg,jpg,png',
            'description' => 'required',
        ]);

        $image = $request->file('image');
        $slug  = Str::slug($request->name);
        $member = Management::find($id);

        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('team')){
                Storage::disk('public')->makeDirectory('team');
            }
            if(Storage::disk('public')->exists('team/'.$member->image)){
                Storage::disk('public')->delete('team/'.$member->image);
            }
            $memberimg = Image::make($image)->resize(768, 768)->save();
            Storage::disk('public')->put('team/'.$imagename, $memberimg);
        }else{
            $imagename = $member->image;
        }

        $member->name           = $request->name;
        $member->email          = $request->email;
        $member->phone          = $request->phone;
        $member->bio            = $request->bio;
        $member->position       = $request->position;
        $member->description    = $request->description;
        $member->image          = $imagename;
        $member->facebook       = $request->facebook;
        $member->instagram      = $request->instagram;
        $member->twitter        = $request->twitter;
        $member->linkedin       = $request->linkedin;
        $member->save();

        Toastr::success('message', 'Management team member updated successfully.');
        return redirect()->route('admin.team.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Management::find($id);

        if(Storage::disk('public')->exists('team/'.$member->image)){
            Storage::disk('public')->delete('team/'.$member->image);
        }

        $member->delete();

        Toastr::success('message', 'Management team member deleted successfully.');
        return back();
    }
}
