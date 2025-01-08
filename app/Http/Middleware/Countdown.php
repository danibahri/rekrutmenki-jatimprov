<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Home;
use Symfony\Component\HttpFoundation\Response;

class Countdown
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $data= Home::first();
        $start = $data->open_pendaftaran;
        $end = $data->exp_pendaftaran;
        $currentDate = now();

        if ($currentDate->gt($start) && $currentDate->lt($end)) {
            return $next($request);
        } else {
            return redirect()->route('countdown');
        }

        return $next($request);
    }
}
