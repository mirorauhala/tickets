<?php

namespace Domain\Dashboard\Middleware;

use Closure;

class HasMultipleEvents
{
    /**
     * Check if the authenticated user manages more than 1 event. If not
     * redirect to the event's dashboard.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (($event = $request->user()->events)->count() === 1) {
            return redirect()->route('dashboard.show', ['event' => $event->first()]);
        }

        return $next($request);
    }
}
