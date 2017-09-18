<?php namespace App\Http\Controllers;



use Bllim\Datatables\Facade\Datatables;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Bookings;
use Illuminate\Support\Facades\Input;
use App\Project;
class BookingsController extends Controller {

	//use DispatchesCommands, ValidatesRequests;
	
	public function __construct(){
		parent::__construct();
	}
	
	//functions for client---------------------------------------------------------------------------
	
	public function index(){
		return view('admin.bookings')->withscr('view');
	}
	
	public function data(){
		$datatable = \Datatables::of(Bookings::select('slug','created_at','name','email','mobile', 'company', 'business', 'months',
				'seats', 'moveindate', 'workhour', 'consulting', 'location','description')->get())
				->addColumn('operation', function ($data) {
					return '<a href="'.\URL::route('admin_bookings_edit', $data->slug).'" class="btn btn-xs btn-info datatable-operation-btn"><i class="fa fa-pencil" aria-hidden="true"></i></a>
								<a href="#" class="btn btn-xs btn-danger datatable-operation-btn" id="det'.$data->slug.'" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top"
									title="Are you sure to delete this?">
									<i class="fa fa-trash" aria-hidden="true"></i></a>
								<script type="text/javascript">
								 	$("#det'.$data->slug.'").popover({
								 		html: \'true\',
									    content : \'<a href="'.\URL::route('admin_bookings_delete', $data->slug).'">\'+
										    \'<button style="margin-left:9px;" type="button" class="btn btn-danger btn-xs">Yes</button></a>\'+
										    \'<button style="margin-left:20px;" type="button" class="btn btn-success btn-xs">No</button>\'
									  });
								</script>';
				})
				->editColumn('created_at', function ($data) {
					return date('d M Y h:i a',strtotime($data->created_at));
				})
				->editColumn('moveindate', function ($data) {
					return date('d M Y',strtotime($data->moveindate));
				})
				->removeColumn('slug')
				->make(true);
				return $datatable;
	}
	
	public function add(){
		return view('admin.bookings_form');
	}
	
	public function submit(){
		$input = Input::all();
		$booking = null;
		if($input['slug'] == ''){
			$booking = new Bookings;
		}else{
			$booking = Bookings::where('slug','=',$input['slug'])->first();
		}	
		$booking->name = $input['name'];
		$booking->email = $input['email'];
		$booking->mobile = $input['mobile'];
		$booking->company = $input['company'];
		$booking->business = $input['business'];
		$booking->months = $input['months'];
		$booking->seats = $input['seats'];
		$booking->moveindate = $input['moveindate'];
		$booking->workhour = $input['workhour'];
		$booking->consulting = $input['consulting'];
		$booking->location = $input['location'];
		$booking->description = $input['description'];
		if($input['slug'] == '')
			$booking->created_by = \Auth::id();
		$booking->updated_by = \Auth::id();
		$booking->save();
		return \Redirect::route('admin_bookings');
	}
	
	public function edit($slug){
		$booking = Bookings::where('slug','=',$slug)->first();
		return view('admin.bookings_form')->withbooking($booking->toArray());
	}
	
	public function delete($slug){
		$booking = Bookings::where('slug','=',$slug)->first();
		if($booking){
			$booking->deleted_at = date('Y-m-d H:i:s');
			$booking->save();
		}
		return \Redirect::route('admin_bookings');
	}
}
