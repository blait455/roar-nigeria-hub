<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;
use Toastr;

class ServiceController extends Controller
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
        $services = Service::latest()->get();

        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');
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
            'title'         => 'required',
            'description'   => 'required|max:200',
            'icon'          => 'required',
            'service_order' => 'required',
        ]);

        $service = new Service();
        $service->title         = $request->title;
        $service->description   = $request->description;
        $service->icon          = $request->icon;
        $service->service_order = $request->service_order;
        $service->save();

        Toastr::success('message', 'Service created successfully.');
        return redirect()->route('admin.services.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $service = Service::findOrFail($service->id);

        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title'         => 'required',
            'description'   => 'required|max:200',
            'icon'          => 'required',
            'service_order' => 'required',
        ]);

        $service = Service::findOrFail($service->id);
        $service->title         = $request->title;
        $service->description   = $request->description;
        $service->icon          = $request->icon;
        $service->service_order = $request->service_order;
        $service->save();

        Toastr::success('message', 'Service updated successfully.');
        return redirect()->route('admin.services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service = Service::findOrFail($service->id);
        $service->delete();

        Toastr::success('message', 'Service deleted successfully.');
        return back();
    }
}
