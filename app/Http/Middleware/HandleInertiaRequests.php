<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Cookie;
use Auth;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {

         if(Auth::user()) {

            if(!isset($_COOKIE['apiToken'])) {
                Auth::user()->tokens()->delete();
                $token =  Auth::user()->createToken('token')->plainTextToken;
                setcookie('apiToken',$token,time() + (86400*30),"/");
            }
            
            } else {
                
                if(isset($_COOKIE['apiToken'])) {
                    setcookie('apiToken','',time() - (86400*3000),"/");
                }

            }

        return array_merge(parent::share($request), [
            'clave' => isset($_COOKIE['apiToken'])? $_COOKIE['apiToken'] : "",
            'usuario' => !is_null(Auth::user()) ? Auth::user() : "", 
           
        ]);
    }
}
