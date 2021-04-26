<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;

// use App\Property;
use App\Post;
use App\Comment;
use App\Contact;
use App\Mail\Contact as MailContact;
use App\Setting;
use App\User;
use Toastr;
use Hash;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        // $propertycount = Property::count();
        $postcount     = Post::count();
        $commentcount  = Comment::count();
        $usercount     = User::count();

        // $properties    = Property::latest()->with('user')->take(5)->get();
        $posts         = Post::latest()->withCount('comments')->take(5)->get();
        // $users         = User::with('role')->get();
        $users         = User::all();
        $comments      = Comment::with('users')->take(5)->get();

        return view('admin.dashboard', compact(
            'postcount', 'commentcount', 'usercount',
            'posts',     'users',        'comments'
        ));
    }


    public function settings()
    {
        $settings = Setting::first();

        return view('admin.settings.setting',compact('settings'));
    }

    public function settingStore(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required',
            'phone'     => 'required',
            'address'   => 'required',
            'footer'    => 'required',
            'about'     => 'required',
            'facebook'  => 'required|url',
            'twitter'   => 'required|url',
            'linkedin'  => 'required|url',
        ]);

        $fav = $request->file('fav');
        $logo = $request->file('logo');
        $slug  = Str::slug($request->name);

        $settings = Setting::first();

        if(isset($fav)){
            $currentDate = Carbon::now()->toDateString();
            $favname = $slug.'-favicon.'.$fav->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('settings')){
                Storage::disk('public')->makeDirectory('settings');
            }
            if(Storage::disk('public')->exists('settings/'.$settings->fav)){
                Storage::disk('public')->delete('settings/'.$settings->fav);
            }
            $setfav = Image::make($fav)->resize(100, 100)->save();
            Storage::disk('public')->put('settings/'.$favname, $setfav);
        }else{
            $favname = $settings->fav;
        }

        if(isset($logo)){
            $currentDate = Carbon::now()->toDateString();
            $logoname = $slug.'-logo.'.$logo->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('settings')){
                Storage::disk('public')->makeDirectory('settings');
            }
            if(Storage::disk('public')->exists('settings/'.$settings->logo)){
                Storage::disk('public')->delete('settings/'.$settings->logo);
            }
            $setlogo = Image::make($logo)->resize(200, 97)->save();
            Storage::disk('public')->put('settings/'.$logoname, $setlogo);
        }else{
            $logoname = $settings->logo;
        }

        // dd($favname);
        Setting::updateOrCreate(
            [ 'id'       => 1 ],
            [
              'name'     => $request->name,
              'slogan'   => $request->slogan,
              'email'    => $request->email,
              'logo'     => $logoname,
              'fav'      => $favname,
              'phone'    => $request->phone,
              'address'  => $request->address,
              'footer'   => $request->footer,
              'about'    => $request->about,
              'facebook' => $request->facebook,
              'twitter'  => $request->twitter,
              'linkedin' => $request->linkedin,
              'instagram' => $request->instagram
            ]
        );


        Toastr::success('message', 'Updated successfully.');
        return back();
    }


    public function changePassword()
    {
        return view('admin.settings.changepassword');

    }

    public function changePasswordUpdate(Request $request)
    {
        if (!(Hash::check($request->get('currentpassword'), Auth::user()->password))) {

            Toastr::error('message', 'Your current password does not matches with the password you provided! Please try again.');
            return redirect()->back();
        }
        if(strcmp($request->get('currentpassword'), $request->get('newpassword')) == 0){

            Toastr::error('message', 'New Password cannot be same as your current password! Please choose a different password.');
            return redirect()->back();
        }

        $this->validate($request, [
            'currentpassword' => 'required',
            'newpassword' => 'required|string|min:6|confirmed',
        ]);

        $user = Auth::user();
        $user->password = bcrypt($request->get('newpassword'));
        $user->save();

        Toastr::success('message', 'Password changed successfully.');
        return redirect()->back();
    }


    public function profile()
    {
        $user = Auth::user();
        // dd($user->name);

        return view('admin.settings.profile', compact('user'));
    }

    public function profileUpdate(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'username'  => 'required',
            'email'     => 'required|email',
            'image'     => 'image|mimes:jpeg,jpg,png',
            'about'     => 'max:250'
        ]);

        $user = User::find(Auth::id());

        $image = $request->file('image');
        $slug  = Str::slug($request->name);

        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-admin-'.Auth::id().'-'.$currentDate.'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('users')){
                Storage::disk('public')->makeDirectory('users');
            }
            if(Storage::disk('public')->exists('users/'.$user->image) && $user->image != 'default.png' ){
                Storage::disk('public')->delete('users/'.$user->image);
            }
            $userimage = Image::make($image)->stream();
            Storage::disk('public')->put('users/'.$imagename, $userimage);

        }else{
            $imagename = $user->image;
        }

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->image = $imagename;
        $user->about = $request->about;

        $user->save();

        return back();
    }


    // // MESSAGE
    public function message()
    {
        $messages = Contact::latest()->get();

        return view('admin.settings.messages.index',compact('messages'));
    }

    public function messageRead($id)
    {
        $message = Contact::findOrFail($id);

        return view('admin.settings.messages.readmessage',compact('message'));
    }

    public function messageReply($id)
    {
        $message = Contact::findOrFail($id);

        return view('admin.settings.messages.replymessage',compact('message'));
    }

    // public function messageSend(Request $request)
    // {
    //     $request->validate([
    //         'agent_id'  => 'required',
    //         'user_id'   => 'required',
    //         'name'      => 'required',
    //         'email'     => 'required',
    //         'phone'     => 'required',
    //         'message'   => 'required'
    //     ]);

    //     Message::create($request->all());

    //     Toastr::success('message', 'Message send successfully.');
    //     return back();

    // }

    public function messageReadUnread(Request $request)
    {
        $status = $request->status;
        $msgid  = $request->messageid;

        if($status){
            $status = 0;
        }else{
            $status = 1;
        }

        $message = Contact::findOrFail($msgid);
        $message->status = $status;
        $message->save();

        return redirect()->route('admin.message');
    }

    // public function messageDelete($id)
    // {
    //     $message = Message::findOrFail($id);
    //     $message->delete();

    //     Toastr::success('message', 'Message deleted successfully.');
    //     return back();
    // }

    public function contactMail(Request $request)
    {
        $message  = $request->message;
        $name     = $request->name;
        $mailfrom = $request->mailfrom;
        $subject  = $request->subject;

        Mail::to($request->email)->send(new MailContact($message, $name, $mailfrom, $subject));

        Toastr::success('message', 'Mail sent successfully.');
        return back();
    }
}
