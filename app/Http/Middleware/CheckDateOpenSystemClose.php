<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\DateOpenSystemClose;


class CheckDateOpenSystemClose
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
        $dateOpenClose = DateOpenSystemClose::find(1);
        $dataCurrrent = date('Y-m-d');

        
        if ($dataCurrrent >= $dateOpenClose->date_open->format('Y-m-d') && $dataCurrrent <= $dateOpenClose->date_close->format('Y-m-d'))
        
            return $next($request);

        return response()->view('warning.warning' ,\compact('dateOpenClose'));

    }
}
