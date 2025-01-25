<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PreventCitizenBackHistoryMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Security headers
        $this->setSecurityHeaders($response);

        // Set CORS headers
        $this->setCORSHeaders($request, $response);

        // Set cookies
        $this->setCookies($response);

        // Handle session expiration
        $this->handleSessionExpiration($request);

        // Set CSRF tokens
        $this->setCSRFHeaders($request, $response);

        // Set CSRF tokens for AJAX requests
        if ($request->ajax()) {
            $this->setCSRFHeadersForAjax($request, $response);
        }

        // Set CSRF tokens for form requests
        if ($request->method() === 'POST' || $request->method() === 'PUT' || $request->method() === 'PATCH') {
            $this->setCSRFHeadersForForm($request, $response);
        }

        return $response;
    }

    /**
     * Set security headers.
     */
    protected function setSecurityHeaders(Response $response)
    {
        $response->headers->set('X-Frame-Options', 'DENY');
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('X-Permitted-Cross-Domain-Policies', 'master-only');
        $response->headers->set('X-Download-Options', 'noopen');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
        $response->headers->set('Cache-Control', 'no-cache, no-store, must-revalidate, post-check=0, pre-check=0');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expires', 'Sat, 26 Jul 1997 05:00:00 GMT');
        $response->headers->set('Content-Security-Policy', "frame-ancestors 'none'");
    }

    /**
     * Set CORS headers.
     */
    protected function setCORSHeaders(Request $request, Response $response)
    {
        $response->headers->set('Access-Control-Allow-Origin', $request->header('Origin') ?: '*');
        $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, PATCH, OPTIONS, DELETE');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With, X-HTTP-Method-Override, X-XSRF-TOKEN');
        $response->headers->set('Access-Control-Allow-Credentials', 'true');
        $response->headers->set('Access-Control-Expose-Headers', 'Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With, X-HTTP-Method-Override, X-XSRF-TOKEN');
        $response->headers->set('Access-Control-Max-Age', '1728000');
    }

    /**
     * Set cookies for CSRF tokens.
     */
    protected function setCookies(Response $response)
    {
        $cookieDuration = 60 * 24 * 365; // 1 year

        $csrfToken = csrf_token();
        $response->headers->setCookie(cookie('XSRF-TOKEN', $csrfToken, $cookieDuration));
        $response->headers->setCookie(cookie('XSRF-TOKEN-OLD', $csrfToken, $cookieDuration));
        $response->headers->setCookie(cookie('XSRF-TOKEN-NEW', $csrfToken, $cookieDuration));
        $response->headers->setCookie(cookie('XSRF-TOKEN-OLD-NEW', $csrfToken, $cookieDuration));
        $response->headers->setCookie(cookie('XSRF-TOKEN-NEW-OLD', $csrfToken, $cookieDuration));
        $response->headers->setCookie(cookie('XSRF-TOKEN-OLD-NEW-OLD', $csrfToken, $cookieDuration));
        $response->headers->setCookie(cookie('XSRF-TOKEN-NEW-OLD-NEW', $csrfToken, $cookieDuration));
    }

    /**
     * Handle session expiration and logout.
     */
    protected function handleSessionExpiration(Request $request)
    {
        if ($request->session()->has('logged_in')) {
            if (time() - $request->session()->get('last_activity') > 3600) { // 1 hour
                $request->session()->invalidate();
                $request->session()->regenerate();
                $this->resetSessionTokens($request);

                return redirect()->route('frontend.citizen.login')->with('error', 'Your session has expired. Please log in again.');
            } else {
                $request->session()->put('last_activity', time());
            }
        } else {
            $request->session()->put('logged_in', false);
            $request->session()->put('last_activity', time());
        }
    }

    /**
     * Reset session CSRF tokens.
     */
    protected function resetSessionTokens(Request $request)
    {
        $csrfToken = csrf_token();
        $request->session()->put('csrf_token', $csrfToken);
        $request->session()->put('csrf_token_old', $csrfToken);
        $request->session()->put('csrf_token_new', $csrfToken);
        $request->session()->put('csrf_token_old_new', $csrfToken);
        $request->session()->put('csrf_token_new_old', $csrfToken);
        $request->session()->put('csrf_token_old_new_old', $csrfToken);
        $request->session()->put('csrf_token_new_old_new', $csrfToken);
        $request->session()->put('csrf_token_old_new_old_new', $csrfToken);
    }

    /**
     * Set CSRF token headers and session.
     */
    protected function setCSRFHeaders(Request $request, Response $response)
    {
        // Set CSRF token header for the response
        $response->headers->set('X-CSRF-TOKEN', csrf_token());

        // Set CSRF token in the session for form and AJAX requests
        $csrfToken = csrf_token();
        $request->session()->put('csrf_token', $csrfToken);

        if ($request->ajax()) {
            $request->session()->put('csrf_token_ajax', $csrfToken);
        } else {
            $request->session()->forget('csrf_token_ajax');
        }

        if ($request->isMethod('post')) {
            $request->session()->put('csrf_token_form', $csrfToken);
        } else {
            $request->session()->forget('csrf_token_form');
        }
    }

    /**
     * Set CSRF token headers and session for AJAX requests.
     */
    protected function setCSRFHeadersForAjax(Request $request, Response $response)
    {
        $response->headers->set('X-CSRF-TOKEN', csrf_token());
        $request->session()->put('csrf_token_ajax', csrf_token());
    }

    /**
     * Set CSRF token headers and session for form requests.
     */
    protected function setCSRFHeadersForForm(Request $request, Response $response)
    {
        $response->headers->set('X-CSRF-TOKEN', csrf_token());
        $request->session()->put('csrf_token_form', csrf_token());
    }
}
