<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Route;

class Authenticate extends Middleware
{

    protected $user_route = 'login';
    protected $company_route = 'company.login';

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        //if (! $request->expectsJson()) {
        //    return route('login');
        //}

        //ルーティングに応じて未ログイン時のリダイレクト先を振り分ける
        if (! $request->expectsJson()) {
            if (Route::is('company.*')==true){
                return route($this->company_route);
            }
            if(Route::is('user.*')==true) {
                return route($this->user_route);
            } 
        }
    }
}
