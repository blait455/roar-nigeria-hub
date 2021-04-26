<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Partners;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Toastr;


class PartnerController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $partners = Partners::all();

        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:partners|max:255',
            'logo' => 'required|mimes:jpeg,jpg,png'
        ]);

        $logo = $request->file('logo');
        $slug  = Str::slug($request->name);

        if(isset($logo)){
            $currentDate = Carbon::now()->toDateString();
            $logoname = $slug.'-logo-'.$currentDate.'-'.uniqid().'.'.$logo->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('partners')){
                Storage::disk('public')->makeDirectory('partners');
            }
            $startuplogo = Image::make($logo)->resize(400, 100)->save();
            Storage::disk('public')->put('partners/'.$logoname, $startuplogo);
        }else{
            $logoname = 'default.png';
        }

        $partner = new Partners();
        $partner->name = $request->name;
        $partner->slug = $slug;
        $partner->logo = $logoname;
        $partner->link = $request->link;
        $partner->save();

        Toastr::success('message', 'Partner created successfully.');
        return redirect()->route('admin.partners.index');
    }

    public function edit($id)
    {
        $partner = Partners::find($id);
        // dd($partner->slug);

        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'logo' => 'mimes:jpeg,jpg,png'
        ]);

        $logo = $request->file('logo');
        $slug  = Str::slug($request->name);
        $partners = Partners::find($id);
        if(isset($logo)){
            $currentDate = Carbon::now()->toDateString();
            $logoname = $slug.'-'.$currentDate.'-'.uniqid().'.'.$logo->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('partners')){
                Storage::disk('public')->makeDirectory('partners');
            }
            if(Storage::disk('public')->exists('partners/'.$partners->logo)){
                Storage::disk('public')->delete('partners/'.$partners->logo);
            }
            $partnerslogo = Image::make($logo)->resize(400, 100)->save();
            Storage::disk('public')->put('partners/'.$logoname, $partnerslogo);
        }else{
            $logoname = $partners->logo;
        }

        $partners->name = $request->name;
        $partners->slug = $slug;
        $partners->logo = $logoname;
        $partners->link  = $request->link;
        $partners->update();

        Toastr::success('message', 'Partner updated successfully.');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $partner = Partners::find($id);
        if(Storage::disk('public')->exists('partners/'.$partner->logo)){
            Storage::disk('public')->delete('partners/'.$partner->logo);
        }

        $partner->delete();

        Toastr::success('message', 'Partner deleted successfully.');
        return back();
    }
}
