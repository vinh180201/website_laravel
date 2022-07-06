<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class auth_anthinhphatjsc
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
        if ($request->hasHeader('Authorization')) {
            $header = $request->header('Authorization');
            if ($header == 'chung_toi_la_anthinhphat_jsc') {
                return $next($request);
            }
            return response()->json('token ko dung dinh dang',401);
        }
        return response()->json('token ko dung dinh dang',401);
    }
}
