<?php

namespace App\Http\Middleware;
use App\t_attendancerecord;
use Closure;

class RedirectStart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $attendance_id = session()->get("attendance_id",[]);

        if (Empty($attendance_id)) {
            return redirect('/start');
        }

        return $next($request);

    }
}