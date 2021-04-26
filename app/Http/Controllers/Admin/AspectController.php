<?php

namespace App\Http\Controllers\Admin;

use App\Aspect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Toastr;

class AspectController extends Controller
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
        $aspects = Aspect::all();

        return view('admin.aspects.index', compact('aspects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.aspects.create');
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
            'title' => 'required|unique:aspects|max:255'
        ]);

        $aspect = new Aspect();
        $aspect->title = $request->title;
        $aspect->slug = Str::slug($request->title);
        $aspect->description = $request->description;
        $aspect->save();

        Toastr::success('message', 'Aspect created successfully.');
        return redirect()->route('admin.aspect.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aspect  $aspect
     * @return \Illuminate\Http\Response
     */
    public function show(Aspect $aspect)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Aspect  $aspect
     * @return \Illuminate\Http\Response
     */
    public function edit(Aspect $aspect)
    {
        return view('admin.aspects.edit', compact('aspect'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aspect  $aspect
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aspect $aspect)
    {
        $request->validate([
            'title' => 'required|max:255'
        ]);

        $aspect->title = $request->title;
        $aspect->slug = Str::slug($request->title);
        $aspect->description = $request->description;
        $aspect->save();

        Toastr::success('message', 'Aspect updated successfully.');
        return redirect()->route('admin.aspect.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aspect  $aspect
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aspect $aspect)
    {
        $aspect->delete();

        Toastr::success('message', 'Aspect deleted successfully.');
        return back();
    }
}
