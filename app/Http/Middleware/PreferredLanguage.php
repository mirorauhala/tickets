<?php

namespace Tikematic\Http\Middleware;

use Closure, Session, Auth;

class PreferredLanguage
{

    /**
     * Available languages.
     *
     * @array $languages
     */
    protected $languages = ['en', 'fi'];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        // check if the user is logged in
        if(Auth::check()) {
            // get the locale from database and set to app

            if(Auth::user()->language == null) {
                app()->setLocale($request->getPreferredLanguage($this->languages));
            } else {
                app()->setLocale(Auth::user()->language);
            }
        } else {
            // get the locale from session and set to app
            app()->setLocale($request->getPreferredLanguage($this->languages));
        }

        // return
        return $next($request);
    }
}
