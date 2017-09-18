<?php namespace App\Http\Controllers;



use Bllim\Datatables\Facade\Datatables;

use App\Campaign;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Input;
use App\ContactUs;
use function Monolog\Handler\mail;
use App\NewsLetterSubscription;
class NewsLetterController extends Controller {

	//use DispatchesCommands, ValidatesRequests;
	
	public function __construct(){
		parent::__construct();
	}
	
	//functions for client---------------------------------------------------------------------------
	
	public function index(){
		return view('admin.news_letter_subscription');
	}
	
	public function data(){
		$datatable = \Datatables::of(NewsLetterSubscription::select('id','created_at','email')->get())
					->addColumn('operation', function ($data) {
						return '<a href="#" class="btn btn-xs btn-danger datatable-operation-btn" id="det'.$data->id.'" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top"
									title="Are you sure to delete this?">
									<i class="fa fa-trash" aria-hidden="true"></i></a>
								<script type="text/javascript">
								 	$("#det'.$data->id.'").popover({
								 		html: \'true\',
									    content : \'<a href="'.\URL::route('news_letter_subscription_delete', $data->id).'">\'+
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
	
	public function delete($id){
		$news_letter_subscription = NewsLetterSubscription::where('id','=',$id)->first();
		if($news_letter_subscription){
			$news_letter_subscription->deleted_at = date('Y-m-d H:i:s');
			$news_letter_subscription->save();
		}
		return \Redirect::route('news_letter_subscription');
	}
	
	public function submit(){
		$input = Input::all();
		$nls = new NewsLetterSubscription;
		$nls->email = $input['email'];
		$nls->save();
		return "success";
	}
}
