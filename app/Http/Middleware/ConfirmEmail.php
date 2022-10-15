<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ConfirmEmail
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
        if ($request->user()->email_verified_at === null) {
            session()->flash('confirm', 'Please confirm your email!');

            return redirect()->route('home');
        }

        return $next($request);
    }
}
