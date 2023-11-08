<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Support\Facades\Http;
use Helper;

class userAutoLogin
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
        if(@$request->token){
            session()->put('token', $request->token);
            
            if(!Auth::guard('corporate')->check()){
                $response = Http::get(Helper::mainDomain().'/api/userAuthCheck?token='.$request->token);
                Auth::guard('corporate')->loginUsingId($response['id']);
            }
        }
        
        return $next($request);
    }
}
