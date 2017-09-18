<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Input;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(){
        //$this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }
    
    /**
     * View login page
     */
    protected function index(){
    	if(\Auth::check()){
    		return \Redirect::route('admin_messages');
    	}else{
    		return view('auth/login');
    	}
    }
    
    /**
     * View login page
     */
    protected function verifylogin(){
    	$input = Input::all();
    	$rules = array(
    			'email' => 'required|email|max:255',
    			'password' => 'required|min:6'
    	);
    	$validator = \Validator::make(Input::all(), $rules);
    	
    	if($validator->fails()){
    		return \Redirect::route('login_index')
    		->withInput()
    		->withErrors($validator);
    	}else{
    		if (\Auth::attempt(array('email' => $input['email'], 'password' => $input['password']))){
    			$user = User::find(\Auth::id());
    			\Auth::setUser($user);
    	
    			$user->login_count = $user->login_count +1;
    			$user->save();
    			
    			return \Redirect::route('admin_messages');
    		}
    		return \Redirect::route('login_index')
    		->with('error_message', 'Invalid email/password. Please try again.')
    		->withInput();
    	}
    }
    
    /**
     * logout
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function logout(){
    	\Auth::logout();
    	return \Redirect::route('login_index');
    }
}
