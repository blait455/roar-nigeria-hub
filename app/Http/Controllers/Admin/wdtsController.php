<?php

namespace App\Http\Controllers\Admin;

use App\Blait;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Toastr;

class wdtsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Blait::all();

        return view('admin.wdts.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.wdts.create');
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
        }

        $student = new Blait();
        $student->name              = $request->name;
        $student->phone             = $request->phone;
        $student->email             = $request->email;
        $student->size              = $request->size;
        $student->pop               = $imagename;
        $student->save();

        Toastr::success('message', 'Student registered successfully.');
        return redirect()->route('admin.wdts.index');
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
        $student = Blait::find($id);

        return view('admin.wdts.edit', compact('student'));
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
            'pop' => 'mimes:jpeg,jpg,png',
        ]);

        $image = $request->file('pop');
        $slug  = Str::slug($request->name);
        $student = Blait::find($id);

        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('blait/wdts')){
                Storage::disk('public')->makeDirectory('blait/wdts');
            }
            if(Storage::disk('public')->exists('blait/wdts/'.$student->pop)){
                Storage::disk('public')->delete('blait/wdts/'.$student->pop);
            }
            $pop = Image::make($image)->stream();
            Storage::disk('public')->put('blait/wdts/'.$imagename, $pop);
        }else{
            $imagename = $student->pop;
        }

        $student->name = $request->name;
        $student->phone = $request->phone;
        $student->email = $request->email;
        $student->size = $request->size;
        $student->pop = $imagename;
        $student->update();

        Toastr::success('message', 'Student registration updated successfully.');
        return redirect()->route('admin.wdts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Blait::find($id);

        if(Storage::disk('public')->exists('blait/wdts/'.$student->pop)){
            Storage::disk('public')->delete('blait/wdts/'.$student->pop);
        }

        $student->delete();

        Toastr::success('message', 'Student deleted successfully.');
        return back();

    }
}
