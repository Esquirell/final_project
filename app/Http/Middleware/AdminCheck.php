<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (Auth::user() === null or !$this->hasRole(Auth::user(), 'admin')) {
            return abort (403);
        }
        return $next($request);
    }

    private function hasRole(User $user, $role)
    {
        return in_array($role, json_decode($user->role));
    }
}
