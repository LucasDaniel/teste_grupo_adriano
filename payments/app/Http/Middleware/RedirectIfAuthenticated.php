<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Services\AdminAuthService;
use App\Exceptions\NotAuthenticateException;
use App\Exceptions\ExpiredAuthenticateException;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        $token = $request->bearerToken();
        $adminAuthService = new AdminAuthService();
        
        if (!$adminAuthService->verifyTokenExists($token)) throw new NotAuthenticateException();
        if ($adminAuthService->verifyTokenExpired($token)) throw new ExpiredAuthenticateException();

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
