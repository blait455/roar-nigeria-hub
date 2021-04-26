<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Gallery;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Toastr;

class EventController extends Controller
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
        $events = Event::latest()->get();

        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.events.create');
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
            'title'          => 'required|unique:events',
            'description'   => 'required',
            'image'     => 'required|image|mimes:jpeg,jpg,png',
        ]);

        $image = $request->file('image');
        $slug  = Str::slug($request->title);

        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('events')){
                Storage::disk('public')->makeDirectory('events');
            }
            if(!Storage::disk('public')->exists('events/front')){
                Storage::disk('public')->makeDirectory('events/front');
            }

            // $eventimage = Image::make($image)->stream();
            $eventimage = Image::make($image)->resize(1600, 980)->save();
            Storage::disk('public')->put('events/'.$imagename, $eventimage);

            // Front page
            $feventimage = Image::make($image)->resize(1000, 1000)->save();
            Storage::disk('public')->put('events/front/'.$imagename, $feventimage);
        }

        $event = new Event();
        $event->title         = $request->title;
        $event->slug         = Str::slug($request->title);
        $event->description  = $request->description;
        $event->image        = $imagename;
        $event->save();

        $gallery = $request->file('galleryimage');
        if($gallery)
        {
            foreach($gallery as $image)
            {
                $currentDate = Carbon::now()->toDateString();
                $galimage['name'] = 'gallery-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
                // $galimage['size'] = $images->getSize();
                $galimage['event_id'] = $event->id;

                if(!Storage::disk('public')->exists('gallery/events')){
                    Storage::disk('public')->makeDirectory('gallery/events');
                }
                $eventimage = Image::make($image)->stream();
                Storage::disk('public')->put('gallery/events/'.$galimage['name'], $eventimage);

                $event->gallery()->create($galimage);
            }
        }

        Toastr::success('message', 'Event added successfully.');
        return redirect()->route('admin.events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('admin.events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $image = $request->file('image');
        $slug  = Str::slug($request->name);

        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('events')){
                Storage::disk('public')->makeDirectory('events');
            }
            if(!Storage::disk('public')->exists('events/front')){
                Storage::disk('public')->makeDirectory('events/front');
            }

            if(Storage::disk('public')->exists('events/'.$event->image)){
                Storage::disk('public')->delete('events/'.$event->image);
            }
            if(Storage::disk('public')->exists('events/front/'.$event->image)){
                Storage::disk('public')->delete('events/front/'.$event->image);
            }

            $eventimage = Image::make($image)->resize(1600, 980)->save();
            Storage::disk('public')->put('events/'.$imagename, $eventimage);

            $eventimage = Image::make($image)->resize(1000, 1000)->save();
            Storage::disk('public')->put('events/front/'.$imagename, $eventimage);
        }else{
            $imagename = $event->image;
        }

        $event->title        = $request->title;
        $event->slug         = Str::slug($request->title);
        $event->description  = $request->description;
        $event->image        = $imagename;

        $gallery = $request->file('galleryimage');
        if($gallery){
            foreach($gallery as $image){
                if(isset($image))
                {
                    $currentDate = Carbon::now()->toDateString();
                    $galimage['name'] = 'gallery-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
                    $galimage['event_id'] = $event->id;

                    if(!Storage::disk('public')->exists('gallery/events')){
                        Storage::disk('public')->makeDirectory('gallery/events');
                    }
                    $eventimage = Image::make($image)->stream();
                    Storage::disk('public')->put('gallery/events/'.$galimage['name'], $eventimage);

                    $event->gallery()->create($galimage);
                }
            }
        }

        $event->save();

        Toastr::success('message', 'Event updated successfully.');
        return redirect()->route('admin.events.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        if(Storage::disk('public')->exists('events/'.$event->image)){
            Storage::disk('public')->delete('events/'.$event->image);
        }
        if(Storage::disk('public')->exists('events/front'.$event->image)){
            Storage::disk('public')->delete('events/front'.$event->image);
        }

        $event->gallery()->detach();

        $event->delete();

        Toastr::success('message', 'Event deleted successfully.');
        return back();

    }

    public function galleryImageDelete(Request $request){

        $galleryimg = Gallery::find($request->id)->delete();

        if(Storage::disk('public')->exists('gallery/events/'.$request->image)){
            Storage::disk('public')->delete('gallery/events/'.$request->image);
        }

        if($request->ajax()){

            return response()->json(['msg' => $galleryimg]);
        }
    }
}
