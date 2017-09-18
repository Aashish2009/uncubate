<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Slider;
use App\Event;
use App\LeaderSpeak;
use App\Blog;
use App\Partner;
use App\GalleryImage;
use App\Project;
use App\TeamMember;
use App\FrontVideoText;
class HomeController extends Controller {

	//use DispatchesCommands, ValidatesRequests;
	
	public function __construct(){
		
	}
	
	public function index(){
		$videoText = FrontVideoText::first();
		$projects = Project::all();
		$testimonial = LeaderSpeak::orderBy('created_at','desc')->get();
		$blogs = Blog::where('blog_status','active')->orderBy('blog_publish_date','desc')->limit(3)->get();
		return view('front.home')->with('projects',$projects->toArray())
								 ->with('testimonial',$testimonial->toArray())
								 ->with('videoText',$videoText->toArray())
								 ->with('blogs',$blogs->toArray());
	}
}
