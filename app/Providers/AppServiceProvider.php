<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;

// use App\Property;
use App\Post;
use App\Tag;
use App\Category;
use App\Contact;
use App\Event;
use App\Partners;
use App\Setting;
use App\Startup;
use Illuminate\Support\Facades\DB;

// use App\Message;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // SHARE TO ALL ROUTES
        // $settings  = Setting::first();
        $settings = DB::table('settings')->first();
        view()->share('settings', $settings);

        $background = DB::table('backgrounds')->first();
        view()->share('background', $background);

        if (! $this->app->runningInConsole()) {

            // SHARE TO ALL ROUTES
            // $bedroomdistinct  = Property::select('bedroom')->distinct()->get();
            // view()->share('bedroomdistinct', $bedroomdistinct);

            // $cities   = Property::select('city')->distinct()->get();
            // $citylist = array();
            // foreach($cities as $city){
            //     $citylist[$city['city']] = NULL;
            // }
            // view()->share('citylist', $citylist);


            // SHARE WITH SPECIFIC VIEW
            // view()->composer('pages.search', function($view) {
            //     $view->with('bathroomdistinct', Property::select('bathroom')->distinct()->get());
            // });

            view()->composer('frontend.partials.footer', function($view) {
                // $view->with('footerproperties', Property::latest()->take(3)->get());
                $view->with('footersettings', Setting::select('footer','about','facebook','twitter','linkedin')->get());
            });

            view()->composer('frontend.partials.navbar', function($view) {
                $view->with('navbarsettings', Setting::select('name')->get());
            });

            view()->composer('backend.partials.navbar', function($view) {
                $view->with('countmessages', Contact::latest()->count());
                $view->with('navbarmessages', Contact::latest()->take(5)->get());
            });

            view()->composer('pages.contact', function($view) {
                $view->with('contactsettings', Setting::select('phone','email','address')->get());
            });

            view()->composer('frontend.pages.blog', function($view) {

                $archives     = Post::archives();
                $categories   = Category::has('posts')->withCount('posts')->get();
                $tags         = Tag::has('posts')->get();
                $popularposts = Post::orderBy('view_count','desc')->take(5)->get();
                $latest_posts = Post::where('status','1')->orderBy('id','DESC')->limit(3)->get();

                $view->with(compact('archives','categories','tags','popularposts', 'latest_posts'));
            });

            view()->composer('frontend.partials.header', function($view) {
                $posts = Post::all();
                $events = Event::all();
                $startups = Startup::all();

                $view->with(compact('posts', 'events', 'startups'));
            });
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
