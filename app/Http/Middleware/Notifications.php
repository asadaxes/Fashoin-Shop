<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class Notifications
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $notifications = $user->notifications()->get();
            View::share('notifications', $notifications);
        }

        return $next($request);
    }
}