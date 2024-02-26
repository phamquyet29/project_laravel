<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RequirePasswordConfirmation
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
        if ($request->user() && !$request->user()->password) {
            return redirect()->route('password.change')->with('error', 'You must set a password before accessing this resource.');
        }

        return $next($request);
    }
}
