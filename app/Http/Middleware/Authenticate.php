<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Access with 'auth:client' or 'auth:provider'
     *
     * This Middleware is for the guards so you can choose for which User the Middleware
     * should work
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * This Method redirect to login_view if you are not logged in
     * or if you are logged in but u are not permitted to view this page(if u have false role)
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        $request->session()->flash('showLogin', true);
        if ( $request->expectsJson()) {
            return view("home.home");
        }
    }
}
