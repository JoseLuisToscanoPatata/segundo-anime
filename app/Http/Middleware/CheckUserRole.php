<?php

namespace App\Http\Middleware;
use Inertia\Inertia;

use Closure;
use Illuminate\Http\Request;

class checkUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if($request->user()->role != "admin") {
            return redirect()->route('dashboard')->with('flash', [
                'bannerStyle' => 'danger',
                'banner' => "You cant access that page !!",
                'posicion' => "top",
            ]);
        }

        return $next($request);
    }
}
