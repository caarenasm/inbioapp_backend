<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

//class InbioApp
class InbioApp extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    /*public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if(!$user){
            return response()->json([
                'message' => 'Sin Autorizacion!'
            ], 401);
        }

        return $next($request);
    }*/

    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return response()->json([
                'message' => 'Sin Autorizacion!'
            ], 401);
        }
    }
}
