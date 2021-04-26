<?php

namespace App\Http\Controllers\Admin;

use App\Aspect;
use App\Http\Controllers\Controller;
use App\Incubation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Toastr;

class IncubationController extends Controller
{
    // public function __construct() {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = Incubation::latest()->get();

        return view('admin.incubation.index', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aspects = Aspect::all();

        return view('admin.incubation.create', compact('aspects'));
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
        ]);

        $startup = new Incubation();
        $startup->aspect_id         = $request->aspect_id;
        $startup->name              = $request->name;
        $startup->phone             = $request->phone;
        $startup->email             = $request->email;
        $startup->status            = 1;
        $startup->idea_duration     = $request->idea_duration;
        $startup->idea_description  = $request->idea_description;
        $startup->motivation        = $request->motivation;
        $startup->medium_aware      = $request->medium_aware;
        $startup->problem           = $request->problem;
        $startup->type              = $request->type;
        $startup->age               = $request->age;
        $startup->fav_color         = $request->fav_color;
        $startup->course            = $request->course;
        $startup->fav_subject       = $request->fav_subject;
        $startup->biz_experience    = $request->biz_experience;
        $startup->reason            = $request->reason;
        $startup->save();

        Toastr::success('message', 'Application submitted successfully.');
        return redirect()->route('admin.incubation.index');
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
        $application = Incubation::find($id);
        $aspects = Aspect::all();

        return view('admin.incubation.edit', compact('application', 'aspects'));
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
        ]);

        $startup = Incubation::find($id);
        $startup->aspect_id         = $request->aspect_id;
        $startup->name              = $request->name;
        $startup->phone             = $request->phone;
        $startup->email             = $request->email;
        $startup->status            = $request->status;
        $startup->idea_duration     = $request->idea_duration;
        $startup->idea_description  = $request->idea_description;
        $startup->motivation        = $request->motivation;
        $startup->medium_aware      = $request->medium_aware;
        $startup->problem           = $request->problem;
        $startup->type              = $request->type;
        $startup->age               = $request->age;
        $startup->fav_color         = $request->fav_color;
        $startup->course            = $request->course;
        $startup->fav_subject       = $request->fav_subject;
        $startup->biz_experience    = $request->biz_experience;
        $startup->reason            = $request->reason;
        $startup->update();

        Toastr::success('message', 'Application updated successfully.');
        return redirect()->route('admin.incubation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $application = Incubation::find($id);
        $application->delete();

        Toastr::success('message', 'Application deleted successfully.');
        return back();
    }
}
