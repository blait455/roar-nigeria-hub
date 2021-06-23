<?php

namespace App\Http\Controllers\Admin;

use App\Community;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Toastr;

class RoarTCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Community::all();

        return view('admin.rtc.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rtc.create');
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

        $student = new Community();
        $student->name              = $request->name;
        $student->phone             = $request->phone;
        $student->email             = $request->email;
        $student->dept              = $request->dept;
        $student->field              = $request->field;
        $student->level              = $request->level;
        $student->save();

        Toastr::success('message', 'Student registered successfully.');
        return redirect()->route('admin.rtc.index');
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
        $student = Community::find($id);

        return view('admin.rtc.edit', compact('student'));
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

        $student = Community::find($id);
        $student->name = $request->name;
        $student->phone = $request->phone;
        $student->email = $request->email;
        $student->dept = $request->dept;
        $student->field = $request->field;
        $student->level = $request->level;
        $student->update();

        Toastr::success('message', 'Information updated successfully.');
        return redirect()->route('admin.rtc.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Community::find($id);

        $student->delete();

        Toastr::success('message', 'Student deleted successfully.');
        return back();

    }
}
