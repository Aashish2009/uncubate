<?php namespace App\Http\Controllers;



use Bllim\Datatables\Facade\Datatables;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Bookings;
use Illuminate\Support\Facades\Input;
use App\Project;
use App\FrontVideoText;
class VideoTextController extends Controller {

	//use DispatchesCommands, ValidatesRequests;
	
	public function __construct(){
		parent::__construct();
	}
	
	//functions for client---------------------------------------------------------------------------
	
	public function index(){
		$data = FrontVideoText::first();
		return view('admin.video_text')->withdata($data);
	}
	
	public function submit(){
		$input = Input::all();
		$vt = FrontVideoText::first();
		$vt->big_text = $input['big_text'];
		$vt->small_text = $input['small_text'];
		$vt->medium_text = $input['medium_text'];
		$vt->updated_by = \Auth::id();
		
		$video = Input::file('video');
		$filename = '';
		if($video){
			$destinationPath = 'upload/video/';
			$filename = 'background-video.'.$video->getClientOriginalExtension();
			Input::file('video')->move($destinationPath, $filename);
			$vt->video_url = $destinationPath.$filename;
		}
		$vt->save();
		return \Redirect::route('admin_video_text');
	}
	
	public function edit(){
		$data = FrontVideoText::first();
		return view('admin.video_text_form')->withdata($data->toArray());
	}
}
