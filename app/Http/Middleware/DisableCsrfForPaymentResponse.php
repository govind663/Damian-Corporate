<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class DisableCsrfForPaymentResponse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the route is the payment response route name (payment.response)
        if (Route::currentRouteName() === 'payment.response') {
            // Disable CSRF validation for this specific route
            Session::forget('csrf_token');
        }
        return $next($request);
    }
}
