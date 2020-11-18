<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuth
{
    /**
     * Access with 'guest'
     *
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        //Prüfe ob jemand eingeloggt ist wenn ja leite die Seite um
       if (Auth::guard("client")->check() || Auth::guard("provider")->check())
            return redirect(RouteServiceProvider::HOME);

        return $next($request);
    }

}
