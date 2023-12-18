<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckOwnership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $model): Response
    {
        $content = app('App\\Models\\' . ucfirst($model))::findOrFail($request->route('id'));

        if ($content->user_id !== auth()->user()->id) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
