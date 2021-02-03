<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {


//AppLangUser
app('view')->composer('*', function ($view) {
    $AppLangUser = LangUser(\App::getLocale());
    if($AppLangUser != 'ar') {
        $AppDirUser = 'ltr' ;
    } else {
        $AppDirUser = 'rtl' ;
    }
    $view->with(compact('AppLangUser','AppDirUser'));
});

 // Pass settings to all views
        app('view')->composer('*', function ($view) {
            $settings = \App\Settings::find(1);
            $view->with(compact('settings'));
        });


        // Pass latest posts to tiker header
        app('view')->composer('frontend.includes.header', function ($view) {
            $ticker_latest_posts = \App\Post::whereStatus(1)->latest()->take(10)->get();
            $view->with(compact('ticker_latest_posts'));
        });


//latest posts in category page
        app('view')->composer('*', function ($view) {
            $latest_sidebar_posts = \App\Post::where('status', 1 )->latest()->take(6)
            ->where('category' , '!=' , 'videos')->get();
            $view->with(compact('latest_sidebar_posts'));
        });


        //latest videos in category page
        app('view')->composer('*', function ($view) {
            $latest_sidebar_videos = \App\Post::where('status', 1 )->latest()->take(6)
            ->where('category' , '=' , 'videos')->get();
            $view->with(compact('latest_sidebar_videos'));
        });





    }
}
