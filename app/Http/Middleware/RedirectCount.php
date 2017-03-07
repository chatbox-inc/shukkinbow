<?php

namespace App\Http\Middleware;
use Closure;

class RedirectCount
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
        $count_flag = session()->get("count_flag",[]);
        $count_flag = $count_flag;

        if($count_flag){
            return redirect('/count');
        }

        return $next($request);

    }
}