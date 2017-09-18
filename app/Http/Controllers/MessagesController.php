<?php namespace App\Http\Controllers;

use Bllim\Datatables\Facade\Datatables;

use App\Campaign;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Input;
use App\ContactUs;
use DB;
use function Monolog\Handler\mail;
class MessagesController extends Controller {

	//use DispatchesCommands, ValidatesRequests;
	
	public function __construct(){
		parent::__construct();
	}
	
	//functions for client---------------------------------------------------------------------------
	
	public function index()
	{
		$message = ContactUs::where('is_seen','=','0')->update(['is_seen' => 1]);
		parent::__construct();	
		return view('admin.messages',compact('status'));
	}
	
	public function data()
	{
		if(isset($_POST['columns']) && isset($_POST['columns'][4]) && isset($_POST['columns'][4]['search']) 
				&& isset($_POST['columns'][4]['search']['value']) && $_POST['columns'][4]['search']['value'] == '^On Hold$' || $_POST['columns'][4]['search']['value'] == '^Uncubated$' || $_POST['columns'][4]['search']['value'] == '^Open_Viewed$' || $_POST['columns'][4]['search']['value'] == '^Dont Want$')
		{
	            //->where('statuses.title','==','Open');
	            $datatable = \Datatables::of(ContactUs::select('slug','created_at','name','email','mobile','company', 'business', 'months', 'seats','moveindate', 'workhour', 'consulting', 'location','message','comments','status')
	            	->get())
						->addColumn('operation', function ($data){
							return '<a href="'.\URL::route('admin_messages_view', $data->slug).'" class="btn btn-xs btn-info datatable-operation-btn"><i class="fa fa-eye" aria-hidden="true"></i></a>
								<a href="'.\URL::route('admin_messages_edit', $data->slug).'" class="btn btn-xs btn-warning datatable-operation-btn"><i class="fa fa-pencil" aria-hidden="true"></i></a>
									<a href="#" class="btn btn-xs btn-danger datatable-operation-btn" id="det'.$data->slug.'" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top"
										title="Are you sure to delete this?">
										<i class="fa fa-trash" aria-hidden="true"></i></a>
									<script type="text/javascript">
									 	$("#det'.$data->slug.'").popover({
									 		html: \'true\',
										    content : \'<a href="'.\URL::route('admin_messages_delete', $data->slug).'">\'+
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
		}else{
			$datatable = \Datatables::of(ContactUs::select('slug','created_at','name','email','mobile','company', 'business', 'months', 'seats','moveindate', 'workhour', 'consulting', 'location','message','comments','status')
	            ->where('status','!=','On Hold')
	            ->where('status','!=','Open_Viewed')
	            ->where('status','!=','Dont Want')
	            ->where('status','!=','Uncubated')
	            ->get())
						->addColumn('operation', function ($data){
							return '<a href="'.\URL::route('admin_messages_view', $data->slug).'" class="btn btn-xs btn-info datatable-operation-btn"><i class="fa fa-eye" aria-hidden="true"></i></a>
								<a href="'.\URL::route('admin_messages_edit', $data->slug).'" class="btn btn-xs btn-warning datatable-operation-btn"><i class="fa fa-pencil" aria-hidden="true"></i></a>
									<a href="#" class="btn btn-xs btn-danger datatable-operation-btn" id="det'.$data->slug.'" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top"
										title="Are you sure to delete this?">
										<i class="fa fa-trash" aria-hidden="true"></i></a>
									<script type="text/javascript">
									 	$("#det'.$data->slug.'").popover({
									 		html: \'true\',
										    content : \'<a href="'.\URL::route('admin_messages_delete', $data->slug).'">\'+
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
	}

	public function delete($slug){
		$message = ContactUs::where('slug','=',$slug)->first();
		if($message){
			$message->deleted_at = date('Y-m-d H:i:s');
			$message->save();
		}
		return \Redirect::route('admin_messages');
	}
	
	public function view($slug){
		$message = ContactUs::where('slug','=',$slug)->first();
		if($message){
			$message->is_seen = 1;
			$message->save();
			parent::__construct();
		}
		return view('admin.messages_view')->with('message',$message);
	}
	
	public function submit(){
		$input = Input::all();
		$msg = new ContactUs;
		$msg->name = $input['name'];
		$msg->email = $input['email'];
		$msg->mobile = $input['mobile'];
		$msg->company = $input['company'];
		$msg->business = $input['business'];
		$msg->months = $input['months'];
		$msg->seats = $input['seats'];
		$msg->moveindate = $input['moveindate'];
		$msg->workhour = $input['workhour'];
		$msg->consulting = $input['consulting'];
		$msg->location = $input['location'];
		$msg->message = $input['message'];
		$msg->save();
		
		/* \Mail::send(['html'=>'front.contactus'],['msg'=>$msg], function($message)use($input) {
			$message->to('fenil@stimulusconsultancy.com')->subject($input['subject']);
			$message->from($input['email']);
		});
		
		\Mail::send(['html'=>'front.contactus'],['msg'=>$msg], function($message)use($input) {
			$message->to('sneh@stimulusconsultancy.com')->subject($input['subject']);
			$message->from($input['email']);
		}); */
			
		return "success";
	}
	public function edit($slug){
		$contactus = ContactUs::where('slug','=',$slug)->first();
		return view('admin.contactus_form',compact('contactus'));
	}
	public function update()
	{	
		$input = Input::all();
		$msg = ContactUs::where('slug','=',$input['slug'])->first();
		$msg->name = $input['name'];
		$msg->email = $input['email'];
		$msg->mobile = $input['mobile'];
		$msg->company = $input['company'];
		$msg->business = $input['business'];
		$msg->months = $input['months'];
		$msg->seats = $input['seats'];
		$msg->moveindate = $input['moveindate'];
		$msg->workhour = $input['workhour1'];
		$msg->consulting = $input['consulting'];
		$msg->location = $input['location'];
		$msg->message = $input['message'];
		$msg->updated_by = \Auth::user()->name;
		$msg->comments=$input['comments'];
		$msg->status=$input['status'];
		$msg->save();
		return \Redirect::route('admin_messages');
	}
	
	public function getContactPage(){
		return view('display.contact_us');
	}
}
