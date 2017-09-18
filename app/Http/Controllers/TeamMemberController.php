<?php namespace App\Http\Controllers;

use Bllim\Datatables\Facade\Datatables;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\TeamMember;
use Illuminate\Support\Facades\Input;
class TeamMemberController extends Controller {

	//use DispatchesCommands, ValidatesRequests;
	
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		return view('admin.team_member');
	}
	
	public function data(){
		$datatable = \Datatables::of(TeamMember::select('slug','created_at','role','fname','lname','email','mobile','technology_known','image_small')->get())
			->addColumn('operation', function ($data) {
				return '<a href="'.\URL::route('admin_team_member_edit', $data->slug).'" class="btn btn-xs btn-warning datatable-operation-btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
						<a href="#" class="btn btn-xs btn-danger datatable-operation-btn" id="det'.$data->slug.'" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top"
							title="Are you sure to delete this?">
							<i class="fa fa-trash" aria-hidden="true"></i></a>
						<script type="text/javascript">
						 	$("#det'.$data->slug.'").popover({
						 		html: \'true\',
							    content : \'<a href="'.\URL::route('admin_team_member_delete', $data->slug).'">\'+
								    \'<button style="margin-left:9px;" type="button" class="btn btn-danger btn-xs">Yes</button></a>\'+
								    \'<button style="margin-left:20px;" type="button" class="btn btn-success btn-xs">No</button>\'
							  });
						</script>';
			})
			->editColumn('fname', function ($data) {
				return $data->fname.' '.$data->lname;
			})
			->editColumn('image_small', function ($data) {
				return '<img src="'.\URL::asset($data->image_small).'" style="max-width: 75px;" width="100%">';
			})
			->removeColumn('slug')
			->make(true);
		return $datatable;
	}
	
	public function add(){
		return view('admin.team_member_form');
	}
	
	public function submit(){
		$input = Input::all();
		$team_member = null;
		if($input['slug'] == '')
			$team_member = new TeamMember;
		else 
			$team_member = TeamMember::where('slug','=',$input['slug'])->first();
		$team_member->role = $input['role'];
		$team_member->fname = $input['fname'];
		$team_member->lname = $input['lname'];
		$team_member->email = $input['email'];
		$team_member->mobile = $input['mobile'];
		$team_member->technology_known = $input['technology_known'];
		if($input['joining_date'] != ''){
			$dt = explode('-', $input['joining_date']);
			$team_member->joining_date = $dt[2].'-'.$dt[1].'-'.$dt[0];
		}
		if($input['dob'] != ''){
			$dt = explode('-', $input['dob']);
			$team_member->dob = $dt[2].'-'.$dt[1].'-'.$dt[0];
		}
		$team_member->blood_group = $input['blood_group'];
		$team_member->emergency_contact = $input['emergency_contact'];
		$team_member->pan_number = $input['pan_number'];
		$team_member->ra_society = $input['ra_society'];
		$team_member->ra_area = $input['ra_area'];
		$team_member->ra_city = $input['ra_city'];
		$team_member->ra_pincode = $input['ra_pincode'];
		$team_member->ra_state = $input['ra_state'];
		$team_member->pa_society = $input['pa_society'];
		$team_member->pa_area = $input['pa_area'];
		$team_member->pa_city = $input['pa_city'];
		$team_member->pa_pincode = $input['pa_pincode'];
		$team_member->pa_state = $input['pa_state'];
		if($input['slug'] == ''){
			$team_member->created_by = \Auth::id();
		}
		$team_member->updated_by = \Auth::id();
		
		$image = Input::file('image');
		$filename = '';
		if($image){
			$destinationPath = 'upload/team-member/large/';
			$filename = str_random(10).'.'.$image->getClientOriginalExtension();
			Input::file('image')->move($destinationPath, $filename);
			$img = \Image::make(\URL::asset('upload/team-member/large/'.$filename))->resize(200, null, function ($constraint) {
				$constraint->aspectRatio();
			});
				$img->save('upload/team-member/small/'.$filename);
				$team_member->image_large = $destinationPath.$filename;
				$team_member->image_small = 'upload/team-member/small/'.$filename;
		}
		
		$image = Input::file('address_proof');
		$filename = '';
		if($image){
			$destinationPath = 'upload/team-member/large/';
			$filename = str_random(10).'.'.$image->getClientOriginalExtension();
			Input::file('address_proof')->move($destinationPath, $filename);
			$img = \Image::make(\URL::asset('upload/team-member/large/'.$filename))->resize(200, null, function ($constraint) {
				$constraint->aspectRatio();
			});
				$img->save('upload/team-member/small/'.$filename);
				$team_member->address_proof_large = $destinationPath.$filename;
				$team_member->address_proof_small = 'upload/team-member/small/'.$filename;
		}
		
		$resume = Input::file('resume');
		$filename = '';
		if($resume){
			$destinationPath = 'upload/team-member/resume/';
			$filename = str_random(10).'.'.$resume->getClientOriginalExtension();
			Input::file('resume')->move($destinationPath, $filename);
			$team_member->resume = $destinationPath.$filename;
		}
		
		$team_member->save();
		return \Redirect::route('admin_team_member');
	}
	
	public function edit($slug){
		$team_member = TeamMember::where('slug','=',$slug)->first();
		return view('admin.team_member_form')->withteam_member($team_member->toArray());
	}
	
	public function delete($slug){
		$team_member = TeamMember::where('slug','=',$slug)->first();
		if($team_member){
			$team_member->deleted_at = date('Y-m-d H:i:s');
			$team_member->save();
		}
		return \Redirect::route('admin_team_member');
	}
	
	public function getTeamMembers(){
		$team_members = TeamMember::orderby('team_member_publish_date','desc')->paginate(4);
		if (\Request::ajax()) {
			return view('display.ajax.team_members')->with('team_members', $team_members);
		}
		return view('display.team_members')->with('team_members', $team_members);
	}
	
	public function getTeamMembersDetail($slug){
		$team_member = TeamMember::where('slug','=',$slug)->first();
		return view('display.team_members_detail')->with('team_member', $team_member);
	}
}
