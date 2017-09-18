<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\ContactUs;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
    
    public function __construct(){
    	$msgs['count'] = ContactUs::where('is_seen', '=', '0')->count();
    	$msgs['last5'] = ContactUs::orderby('created_at','desc')->take(5)->get();
    	\View::share('msgs', $msgs);
    }
    
    public function debug($arr){
    	echo "<pre>";
    	if(is_array($arr))
    		print_r($arr);
    	else 
    		print_r($arr->toArray());
    	exit;
    }
}
