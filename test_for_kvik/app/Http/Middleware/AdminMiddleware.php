<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user() != null) {
            if (auth()->user()->role == 'admin') {
                return $next($request);
            }
            return redirect()->route('home');
        }
        return redirect()->route('login');
    }
}
