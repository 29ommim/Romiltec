<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        $user = Auth::user();
        if (!$user) {

            return redirect()->route('home');
        }
        if ($user && $user->role) {
            $roleName = $user->role->name; 
            if ($roleName !== 'Admin') {
                return redirect('/');
            }
        }
        return $response;
    }
}
