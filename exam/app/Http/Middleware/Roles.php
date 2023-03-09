<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Roles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        $midRol = explode('|', $roles);
        $midRol = array_map(fn($r) => User::ROLES[$r], $midRol);
        $user = Auth::user();

        if(!$user) {
            return redirect()->route('login');
        }
        if(in_array($user->role, $midRol)){
            return $next($request);
        }

        abort(401);
    }
}