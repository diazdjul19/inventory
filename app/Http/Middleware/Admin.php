<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
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
        $user = Auth::user();

        if (!isset ($user)) {
            return redirect()->route('login'); 
        }

        if ($user->role == 'admin') {
            return $next($request);
        } elseif ($user->role == 'kasir') {
            return redirect()->route('home_kasir');
        }
        return redirect()->route('login');

        // $user = Auth::user();

        // if($user->role != 'admin') {

        //     return redirect()->route('login');
        // }
        // return $next($request);
    }
}
