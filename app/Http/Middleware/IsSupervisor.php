<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class IsSupervisor
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
        session(['isSupervisor' => False]);
        $score = DB::table('specifications')->where('authorisor', auth()->user()->email)->get()->count();//sp authoriser
        if ($score > 0){
            session(['isSupervisor' => True]);
        }
        return $next($request);
    }
}
