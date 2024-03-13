<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;

class CheckAppStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        

        // Check the application status
        $status = Setting::where('suspension_status', 1)->first();

        if ($status) {
            // Application is suspended
            return response()->view('superadmin.suspension.app_suspended');
        }

                return $next($request);
            }
}

