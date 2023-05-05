<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleCheck
{
    public function handle($request, Closure $next, $rol)
{
    $user = auth()->user();
    
    if (!$user || $user->rol->name !== $rol) {
        return redirect('/');
    }

    return $next($request);
}

}
