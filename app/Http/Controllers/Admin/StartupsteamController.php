<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Startup;
use App\StartupsTeam;
use App\TeamMembers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Toastr;

class StartupsteamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team = TeamMembers::all();

        return view('admin.startups.team.index', compact('team'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $startups = Startup::all();

        return view('admin.startups.team.create', compact('startups'));
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
            'skill' => 'required',
            // 'image' => 'required|mimes:jpeg,jpg,png',
            'phone' => 'required'
        ]);

        $image = $request->file('image');
        $slug  = Str::slug($request->name);

        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('startups/team')){
                Storage::disk('public')->makeDirectory('startups/team');
            }
            $team = Image::make($image)->resize(768, 768)->save();
            Storage::disk('public')->put('startups/team/'.$imagename, $team);
        }else{
            $imagename = 'default.png';
        }

        $team = new TeamMembers();
        $team->startup_id       = $request->startup_id;
        $team->name             = $request->name;
        $team->email            = $request->email;
        $team->phone            = $request->phone;
        // $team->bio          = $request->bio;
        $team->skill            = $request->skill;
        // $team->description  = $request->description;
        // $team->facebook     = $request->facebook;
        // $team->instagram    = $request->instagram;
        // $team->twitter      = $request->twitter;
        // $team->linkedin     = $request->linkedin;
        $team->image            = $imagename;
        $team->save();

        Toastr::success('message', 'Startup team member created successfully.');
        return redirect()->route('admin.steam.index');
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
        $startups = Startup::all();
        $team = TeamMembers::find($id);

        return view('admin.startups.team.edit', compact('startups', 'team'));
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
            'skill' => 'required',
            // 'image' => 'mimes:jpeg,jpg,png',
            'phone' => 'required',
        ]);

        $image = $request->file('image');
        $slug  = Str::slug($request->name);
        $member = TeamMembers::find($id);

        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('startups/team')){
                Storage::disk('public')->makeDirectory('startups/team');
            }
            if(Storage::disk('public')->exists('startups/team/'.$member->image)){
                Storage::disk('public')->delete('startups/team/'.$member->image);
            }
            $memberimg = Image::make($image)->resize(768, 768)->save();
            Storage::disk('public')->put('startups/team/'.$imagename, $memberimg);
        }else{
            $imagename = $member->image;
        }

        $member->startup_id         = $request->startup_id;
        $member->name               = $request->name;
        $member->email              = $request->email;
        $member->phone              = $request->phone;
        // $member->bio            = $request->bio;
        $member->skill              = $request->skill;
        // $member->description    = $request->description;
        $member->image              = $imagename;
        // $member->facebook       = $request->facebook;
        // $member->instagram      = $request->instagram;
        // $member->twitter        = $request->twitter;
        // $member->linkedin       = $request->linkedin;
        $member->save();

        Toastr::success('message', 'Startup team member updated successfully.');
        return redirect()->route('admin.steam.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = TeamMembers::find($id);

        if(Storage::disk('public')->exists('team/'.$member->image)){
            Storage::disk('public')->delete('team/'.$member->image);
        }

        $member->delete();

        Toastr::success('message', 'Startup team member deleted successfully.');
        return back();
    }
}
