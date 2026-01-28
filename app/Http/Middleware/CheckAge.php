<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if age exists in session
        if (!$request->session()->has('age')) {
            // Redirect to age input page if age is not set
            return redirect('/age-input')->with('message', 'Please enter your age to continue.');
        }

        $age = $request->session()->get('age');

        // Check if age is not a number or less than 18
        if (!is_numeric($age) || $age < 18) {
            return response("Không được phép truy cập", 403);
        }

        // Allow the request if age >= 18
        return $next($request);
    }
}
