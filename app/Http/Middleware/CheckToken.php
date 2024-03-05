<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\JWT;
use Illuminate\Http\Request;

use Tymon\JWTAuth\Exceptions\TokenExpiredException;


class CheckToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('Authorization');
        if (!$token) {
            return response()->json(['error' => 'Token not provided'], 401);
        }
        // try {
        //     // dd($token);
        //     JWTAuth::setToken($token);
        //     $payload = JWTAuth::getPayload();
           
            
        //     // $user = JWT::decode($token, config('app.key'), ['HS256']);
        // } catch (\Exception $e) {
        //     return response()->json(['error' => 'Token invalid'], 401);
        // }
        // $request->user = $payload;
        return $next($request);
    }
}
