<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PremiumMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $path = explode("/", $request->path());
        $entered = Role::where('user_id', auth()->user()->id)->where('group_id', end($path))->where('entered', 1)->get();
        if (auth()->user() != null) {
            if (isset($entered)) {
                return $next($request);
            }
            return redirect()->route('home');
        }
        return redirect()->route('login');
    }
}
