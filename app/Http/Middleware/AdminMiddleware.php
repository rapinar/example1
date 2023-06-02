<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use App\Http\Models;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure $next
     */
    public function handle(Request $request, Closure $next)
    {
        if((int) auth()->user()->role !== User::ROLE_ADMIN) {
            abort(404);
        }

        return $next($request);
    }
}
