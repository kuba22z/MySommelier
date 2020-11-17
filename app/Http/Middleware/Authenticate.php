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
     *
     * Get the path the user should be redirected to when they are not authenticated.
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('welcome');
        }
    }
}
