<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MenuMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user()->roles->menu ?? [];



        if ($user == []){
            return redirect('login');
        }
        $segmeent = $request->segments(2);

        if (in_array($segmeent[0], json_decode($user)) ){
            return $next($request);
        }else{
            return response()->view('errors.403',['exception' => "Unauthorized"],403);
        }
    }
}
