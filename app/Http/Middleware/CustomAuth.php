<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class CustomAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $type = null): Response
    {
        if (is_null($type)) {
            return abort(403, 'Nullable User Type');
        }

        if (!Auth::check() || Auth::user()->type != $type) {
            if (Route::has($type . '.login')) {
                return redirect(route($type . '.login'));
            } else {
                return abort(403, 'Invalid User Type');
            }
        }

        return $next($request);
    }
}
