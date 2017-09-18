<?php namespace App\Http\Controllers;



use Bllim\Datatables\Facade\Datatables;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Status;
use Illuminate\Support\Facades\Input;
class StatusController extends Controller {

	//use DispatchesCommands, ValidatesRequests;
	
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		return view('admin.status');
	}
	
	public function data(){
		$datatable = \Datatables::of(Status::select('slug','created_at','status')->get())
			->addColumn('operation', function ($data) {
				return '<a href="'.\URL::route('admin_status_edit', $data->slug).'" class="btn btn-xs btn-warning datatable-operation-btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
						<a href="#" class="btn btn-xs btn-danger datatable-operation-btn" id="det'.$data->slug.'" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top"
							title="Are you sure to delete this?">
							<i class="fa fa-trash" aria-hidden="true"></i></a>
						<script type="text/javascript">
						 	$("#det'.$data->slug.'").popover({
						 		html: \'true\',
							    content : \'<a href="'.\URL::route('admin_status_delete', $data->slug).'">\'+
								    \'<button style="margin-left:9px;" type="button" class="btn btn-danger btn-xs">Yes</button></a>\'+
								    \'<button style="margin-left:20px;" type="button" class="btn btn-success btn-xs">No</button>\'
							  });
						</script>';
			})
			->editColumn('created_at', function ($data) {
				return date('d M Y h:i a',strtotime($data->created_at));
			})
			->removeColumn('slug')
			->make(true);
		return $datatable;
	}
	
	public function add(){
		return view('admin.status_form');
	}
	
	public function submit(){
		$input = Input::all();
		$status = null;
		if($input['slug'] == '')
			$status = new Status;
		else 
			$status = Status::where('slug','=',$input['slug'])->first();
		$status->status = $input['status'];
		if($input['slug'] == '')
			$status->created_by = \Auth::id();
		$status->updated_by = \Auth::id();
		$status->save();
		return \Redirect::route('admin_status');
	}
	
	public function edit($slug){
		$status = Status::where('slug','=',$slug)->first();
		return view('admin.status_form')->withstatus($status->toArray());
	}
	
	public function delete($slug){
		$status = Status::where('slug','=',$slug)->first();
		if($status){
			$status->deleted_at = date('Y-m-d H:i:s');
			$status->save();
		}
		return \Redirect::route('admin_status');
	}
	
	// public function getLocations(){
	// 	$locations = Location::orderby('location_publish_date','desc')->paginate(4);
	// 	if (\Request::ajax()) {
	// 		return view('display.ajax.locations')->with('locations', $locations);
	// 	}
	// 	return view('display.locations')->with('locations', $locations);
	// }
	
	// public function getLocationsDetail($slug){
	// 	$location = Location::where('slug','=',$slug)->first();
	// 	return view('display.locations_detail')->with('location', $location);
	// }
}
