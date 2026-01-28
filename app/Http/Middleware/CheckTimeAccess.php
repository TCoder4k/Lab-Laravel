<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;

class CheckTimeAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $now = Carbon::now(); // Current time
        $startTime = Carbon::parse('07:00'); // Start time (8 AM)
        $endTime = Carbon::parse('16:00'); // End time (6 PM)
        
        // Check if current time is between allowed hours
        if ($now->between($startTime, $endTime)) {
            return $next($request);
        }
        
        // Return error response if outside allowed hours
        return response()->json([
            'message' => 'Access denied. Access is only allowed between 08:00 and 18:00.',
            'current_time' => $now->format('H:i:s')
        ], 403);
    }
}
