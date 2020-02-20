<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ProfileCreatedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!auth()->user()->profile()->where('user_id', auth()->user()->id)->withCount('user')->get()->count() == 1)
        {

            return redirect("/profile/".Auth::user()->id."/init");

        }

        return $next($request);

    }
}
