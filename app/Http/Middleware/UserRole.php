<?php

namespace App\Http\Middleware;

use Closure;

class UserRole
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


        if($request->user()->role == 'admin' ||
            $request->user()->role == 'superadmin'
        )
        {
            return $next($request);
        }else{
            return redirect('logout2');
        }


        return view('error.404');
    }
}