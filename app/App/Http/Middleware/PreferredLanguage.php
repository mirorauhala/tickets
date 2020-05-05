<?php

namespace App\Http\Middleware;

use Closure;

class PreferredLanguage
{
    /**
     * Available languages.
     *
     * @var array
     */
    protected $languages = ['en', 'fi'];

    /**
     * Language to be set.
     *
     * @var string
     */
    protected $language;

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (! $this->overrideLanguage($request)) {
            $this->browserLanguage($request);
            $this->userModelLanguage($request);
        }

        if (! empty($this->language)) {
            app()->setLocale($this->language);
        }

        return $next($request);
    }

    /**
     * Set the language to manually chosen one.
     *
     * @param \Illuminate\Http\Request $request
     * @return string
     */
    protected function overrideLanguage($request)
    {
        return $this->language = $request->session()->get('override_language');
    }

    /**
     * Set language to the preferred one by the browser.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    protected function browserLanguage($request)
    {
        $this->language = $request->getPreferredLanguage($this->languages);
    }

    /**
     * Set the language to the preferred one after logging in.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    protected function userModelLanguage($request)
    {
        if (optional($request->user())->language) {
            $this->language = $request->user()->language;
        }
    }
}
