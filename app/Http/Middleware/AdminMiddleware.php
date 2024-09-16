<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Session;
use Gate;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        // Проверьте, является ли пользователь администратором
        if (Auth::check() && Auth::user()->isAdmin()) {
            return $next($request);
        }

        // Если нет, верните ответ с ошибкой
        return response()->json(['error' => 'Unauthorized'], 403);
    }
}

