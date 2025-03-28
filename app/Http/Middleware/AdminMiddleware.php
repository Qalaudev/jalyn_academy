<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect('/login')->with('error', 'Сіз жүйеге кірмегенсіз!');
        }

        if (auth()->user()->role->name !== 'Admin') {
            return abort(403, 'Сізге рұқсат жоқ!');
        }

        return $next($request);
    }
}
