<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Redirect;
use Closure;
use Illuminate\Contracts\Auth\Guard;

class AuthenticateAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
	protected $auth;
	
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}
	
    public function handle($request, Closure $next, $guard = null)
    {
        if (!$this->auth->guest()){
        	/* if(Auth::user()->type->id != '1'){
        		Auth::logout();
        		return Redirect::route('login');
        	} */
		}else{	
			return \Redirect::route('logout');
		}

        return $next($request);
    }
}
