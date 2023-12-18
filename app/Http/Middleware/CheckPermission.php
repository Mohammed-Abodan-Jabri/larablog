<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next, $permission): Response
    // {
    //     $user = User::findOrFail(Auth::id());
        
    //     if (!$user->hasPermission($permission)) {
    //         abort(403, 'Unauthorized');
    //     }

    //     return $next($request);
    // }
    public function handle($request, Closure $next, ...$permissions): Response
    {
        // Retrieve the currently authenticated user...
        // $user = Auth::user();
        $user = User::find(Auth::id());
        foreach ($permissions as $permission) {
            if ($user === null || !$user->hasPermission($permission)) {
                abort(403, 'Unauthorized');
            }
        }

        return $next($request);
    }
}
