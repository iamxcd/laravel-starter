<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Log;

class VerifyApiPermission
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
        $apiname = $request->route()->getName();
        $allPermission =  Auth::user()->allPermission();
        if (!in_array($apiname, $allPermission)) {
            return response()->json(['message' => '无权限操作', 'code' => 1], 403);
        }
        return $next($request);
    }
}
