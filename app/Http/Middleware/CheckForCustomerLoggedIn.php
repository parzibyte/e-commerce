<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class CheckForCustomerLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Session::put('url.intended', URL::full());
        if (!Auth::check()) {
            Log::debug("No hay usuario logueado");
            return redirect()->route("authenticate_customer");
        }
        if (!Auth::user()->customer) {
            Log::debug("El usuario no es un cliente");
            return redirect()->route("authenticate_customer");
        }
        return $next($request);
    }
}
