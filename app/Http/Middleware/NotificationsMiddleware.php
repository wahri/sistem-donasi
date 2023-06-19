<?php

namespace App\Http\Middleware;

use App\Models\Notification;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class NotificationsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            $notifications = $user->notifications()->orderBy('created_at', 'desc')->get();
            $isNewNotifications = Notification::where('user_id', $user->id)
                ->where('isNew', 1)
                ->exists();
            // $checknotifications = $user->notifications()->where('isNew', 1)->get();
            $newUserNotif = User::where('status', 0)->count();
            view()->share([
                'notifications' => $notifications,
                'isNewNotifications' => $isNewNotifications,    
                'loginUser' => $user,
                'newUserNotif' => $newUserNotif,
            ]);
        }

        return $next($request);
    }
}
