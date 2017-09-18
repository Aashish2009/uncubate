<?php namespace App\Http\Controllers;



use Bllim\Datatables\Facade\Datatables;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\LeaderSpeak;
use Illuminate\Support\Facades\Input;
use App\Project;
class LeadersController extends Controller {

	//use DispatchesCommands, ValidatesRequests;
	
	public function __construct(){
		parent::__construct();
	}
	
	//functions for client---------------------------------------------------------------------------
	
	public function index(){
		return view('admin.leaders')->withscr('view');
	}
	
	public function data(){
		$datatable = \Datatables::of(LeaderSpeak::select('slug','created_at','name','organisation','designation','testimonial','image_small','city','country')->get())
		->addColumn('operation', function ($data) {
			return '<a href="'.\URL::route('admin_leaders_edit', $data->slug).'" class="btn btn-xs btn-warning datatable-operation-btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
					<a href="#" class="btn btn-xs btn-danger datatable-operation-btn" id="det'.$data->slug.'" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top"
						title="Are you sure to delete this?">
						<i class="fa fa-trash" aria-hidden="true"></i></a>
					<script type="text/javascript">
					 	$("#det'.$data->slug.'").popover({
					 		html: \'true\',
						    content : \'<a href="'.\URL::route('admin_leaders_delete', $data->slug).'">\'+
							    \'<button style="margin-left:9px;" type="button" class="btn btn-danger btn-xs">Yes</button></a>\'+
							    \'<button style="margin-left:20px;" type="button" class="btn btn-success btn-xs">No</button>\'
						  });
					</script>';
		})
		->editColumn('created_at', function ($data) {
			return date('d M Y h:i a',strtotime($data->created_at));
		})
		->editColumn('image_small', function ($data) {
			return '<img src="'.\URL::asset($data->image_small).'" style="max-width: 75px;" width="100%">';
		})
		->removeColumn('slug')
		->make(true);
		return $datatable;
	}
	
	public function add(){
		$projects = Project::all();
		return view('admin.leaders_form')->withprojects($projects->toArray());
	}
	
	public function submit(){
		$input = Input::all();
		$leader = null;
		if($input['slug'] == '')
			$leader = new LeaderSpeak;
		else
			$leader = LeaderSpeak::where('slug','=',$input['slug'])->first();
		$leader->name = $input['name'];
		$leader->organisation = $input['organisation'];
		$leader->designation = $input['designation'];
		$leader->testimonial = $input['testimonial'];
		$leader->city = $input['city'];
		$leader->country = $input['country'];
		if($input['slug'] == '')
			$leader->created_by = \Auth::id();
		$leader->updated_by = \Auth::id();
		$image = Input::file('image');
		$filename = '';
		if($image){
			$destinationPath = 'upload/leaders/large/';
			$filename = str_random(10).'.'.$image->getClientOriginalExtension();
			Input::file('image')->move($destinationPath, $filename);
			$img = \Image::make(\URL::asset('upload/leaders/large/'.$filename))->resize(200, null, function ($constraint) {
				$constraint->aspectRatio();
			});
				$img->save('upload/leaders/small/'.$filename);
				$leader->image_large = $destinationPath.$filename;
				$leader->image_small = 'upload/leaders/small/'.$filename;
		}
		$image = Input::file('logo');
		$filename = '';
		if($image){
			$destinationPath = 'upload/leaders/large/';
			$filename = str_random(10).'.'.$image->getClientOriginalExtension();
			Input::file('logo')->move($destinationPath, $filename);
			$img = \Image::make(\URL::asset('upload/leaders/large/'.$filename))->resize(200, null, function ($constraint) {
				$constraint->aspectRatio();
			});
				$img->save('upload/leaders/small/'.$filename);
				$leader->logo_large = $destinationPath.$filename;
				$leader->logo_small = 'upload/leaders/small/'.$filename;
		}
		$leader->save();
		return \Redirect::route('admin_leaders');
	}
	
	public function edit($slug){
		$projects = Project::all();
		$leader = LeaderSpeak::where('slug','=',$slug)->first();
		return view('admin.leaders_form')->withleader($leader->toArray())->withprojects($projects->toArray());
	}
	
	public function delete($slug){
		$leader = LeaderSpeak::where('slug','=',$slug)->first();
		if($leader){
			$leader->deleted_at = date('Y-m-d H:i:s');
			$leader->save();
		}
		return \Redirect::route('admin_leaders');
	}
}
