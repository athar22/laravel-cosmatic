<?php


function LangUser($lang) {

    $CookieName = str_replace(' ', '_' , config('settings.ProjectName'));

    if (!$lang) {
        if (!\Cookie::get($CookieName)) {
        \Cookie::queue($CookieName, config('settings.DefaultLanguage') );
        $langUser = config('settings.DefaultLanguage');
        \App::setLocale(config('settings.DefaultLanguage'));
         } else {
        $langUser = \Cookie::get($CookieName);
        \App::setLocale($langUser);
         }

        } else {
        \Cookie::forget($CookieName);
        if(in_array($lang, \App\Language::pluck('code')->toArray())) {
        \Cookie::queue($CookieName, $lang );
        \App::setLocale($lang);
        $langUser = $lang;
    } else {

        $langUser = \Cookie::get($CookieName);
    }


        }

        return $langUser;

    }


    function DirUser($lang) {

        $AppDir = \App\Language::where('code', $lang)->first()->is_rtl;
        if($AppDir == 1) {
            $AppDir  = 'rtl';
        }else {
            $AppDir  = 'ltr';
        }
        return $AppDir;

        }


  function limit_words($text,$limit) {


            return  \Illuminate\Support\Str::words($text, $limit );

    }



