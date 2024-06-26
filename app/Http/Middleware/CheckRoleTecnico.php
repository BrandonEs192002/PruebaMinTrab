<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRoleTecnico
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role !== 'tecnico') {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
