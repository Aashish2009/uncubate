<?php namespace App\Http\Controllers;

use Bllim\Datatables\Facade\Datatables;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Input;
use App\Project;
use App\ProjectUpdate;
use App\ProjectImage;
use App\ProjectMember;
use App\TeamMember;
use App\Location;
class ProjectsController extends Controller {

	//use DispatchesCommands, ValidatesRequests;
	
	public function __construct(){
		parent::__construct();
	}
	
	//functions for client---------------------------------------------------------------------------
	
	public function index(){
		return view('admin.projects');
	}
	
	public function data(){
		$datatable = \Datatables::of(Project::select('id','slug','image_small','project_title')->get())
					->addColumn('operation', function ($data) {
						return '<a href="'.\URL::route('admin_projects_edit', $data->slug).'" class="btn btn-xs btn-warning datatable-operation-btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
								<a href="#" class="btn btn-xs btn-danger datatable-operation-btn" id="det'.$data->slug.'" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top"
									title="Are you sure to delete this?">
									<i class="fa fa-trash" aria-hidden="true"></i></a>
								<script type="text/javascript">
								 	$("#det'.$data->slug.'").popover({
								 		html: \'true\',
									    content : \'<a href="'.\URL::route('admin_projects_delete', $data->slug).'">\'+
										    \'<button style="margin-left:9px;" type="button" class="btn btn-danger btn-xs">Yes</button></a>\'+
										    \'<button style="margin-left:20px;" type="button" class="btn btn-success btn-xs">No</button>\'
									  });
								</script>';
					})
					->editColumn('start_date', function ($data) {
						return date('d M Y h:i a',strtotime($data->start_date));
					})
					->editColumn('image_small', function ($data) {
						return '<img src="'.\URL::asset($data->image_small).'" style="max-width: 75px;" width="100%">';
					})
					->editColumn('start_dt', function ($data) {
						return date('d M Y',strtotime($data->start_dt));
					})
					->removeColumn('slug')
					->removeColumn('id')
					->make(true);
		return $datatable;
	}
	
	public function add(){
		$locations = Location::all();
		return view('admin.projects_form')->withlocations($locations->toArray());
	}
	
	public function submit(){
		$input = Input::all();
		$project = null;
		if($input['slug'] == '')
			$project = new Project;
		else 
			$project = Project::where('slug','=',$input['slug'])->first();
		$project->location_master_id = $input['location_master_id'];
		$project->type = $input['type'];
		$project->project_title = $input['project_title'];
		if($input['slug'] == '')
			$project->created_by = \Auth::id();
		$project->updated_by = \Auth::id();
		$image = Input::file('image');
		$filename = '';
		if($image){
			$destinationPath = 'upload/projects/large/';
			$filename = str_random(10).'.'.$image->getClientOriginalExtension();
			Input::file('image')->move($destinationPath, $filename);
			$img = \Image::make(\URL::asset('upload/projects/large/'.$filename))->resize(200, null, function ($constraint) {
				$constraint->aspectRatio();
			});
			$img->save('upload/projects/small/'.$filename);
			$project->image_large = $destinationPath.$filename;
			$project->image_small = 'upload/projects/small/'.$filename;
		}
		$project->save();		
		return \Redirect::route('admin_projects');
	}
	
	public function edit($slug){
		$locations = Location::all();
		$project = Project::with('members')->where('slug','=',$slug)->first();
		return view('admin.projects_form')->withproject($project->toArray())->withlocations($locations->toArray());
	}
	
	public function delete($slug){
		$project = Project::where('slug','=',$slug)->first();
		if($project){
			$project->deleted_at = date('Y-m-d H:i:s');
			$project->save();
		}
		return \Redirect::route('admin_projects');
	}
	
	public function updates($project_slug){
		$project = Project::where('slug','=',$project_slug)->first();
		return view('admin.project_updates')->withproject_slug($project_slug)->withproject($project->toArray());
	}
	
	public function updatesData($project_slug){
		$project = Project::where('slug','=', $project_slug)->first();
		$datatable = \Datatables::of(ProjectUpdate::with('project')->where('projects_id','=',$project->id)->select('slug','created_at','image_small','update')->get())
		->addColumn('operation', function ($data) {
			return '<a href="'.\URL::route('admin_project_updates_edit', $data->slug).'" class="btn btn-xs btn-warning datatable-operation-btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
					<a href="#" class="btn btn-xs btn-danger datatable-operation-btn" id="det'.$data->slug.'" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top"
						title="Are you sure to delete this?">
						<i class="fa fa-trash" aria-hidden="true"></i></a>
					<script type="text/javascript">
					 	$("#det'.$data->slug.'").popover({
					 		html: \'true\',
						    content : \'<a href="'.\URL::route('admin_project_updates_delete', $data->slug).'">\'+
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
		->editColumn('start_dt', function ($data) {
			return date('d M Y',strtotime($data->start_dt));
		})
		->removeColumn('slug')
		->removeColumn('project')
		->make(true);
		return $datatable;
	}
	
	public function updatesAdd($project_slug){
		$project = Project::where('slug','=',$project_slug)->first();
		return view('admin.project_updates_form')->withproject_slug($project_slug)->withproject($project->toArray());
	}
	
	public function updatesSubmit($project_slug){
		$input = Input::all();
		$project_update = null;
		if($input['slug'] == '')
			$project_update = new ProjectUpdate;
		else
			$project_update = ProjectUpdate::where('slug','=',$input['slug'])->first();
		$project_update->update = $input['update'];
		$project_update->projects_id = $input['projects_id'];
		if($input['slug'] == '')
			$project_update->created_by = \Auth::id();
		$project_update->updated_by = \Auth::id();
		$image = Input::file('image');
		$filename = '';
		if($image){
			$destinationPath = 'upload/projects/large/';
			$filename = str_random(10).'.'.$image->getClientOriginalExtension();
			Input::file('image')->move($destinationPath, $filename);
			$img = \Image::make(\URL::asset('upload/projects/large/'.$filename))->resize(200, null, function ($constraint) {
				$constraint->aspectRatio();
			});
				$img->save('upload/projects/small/'.$filename);
				$project_update->image_large = $destinationPath.$filename;
				$project_update->image_small = 'upload/projects/small/'.$filename;
		}

		$project_update->save();
		return \Redirect::route('admin_project_updates',$project_slug);
	}
	
	public function updatesEdit($slug){
		$project_update = ProjectUpdate::where('slug','=',$slug)->first();
		$project = Project::where('id','=',$project_update->projects_id)->first();
		return view('admin.project_updates_form')->withproject($project->toArray())->withproject_update($project_update->toArray())->withproject_slug($project->slug);
	}
	
	public function updatesDelete($slug){
		$project_update = ProjectUpdate::where('slug','=',$slug)->first();
		if($project_update){
			$project_update->deleted_at = date('Y-m-d H:i:s');
			$project_update->save();
		}
		$project = Project::where('id','=',$project_update->projects_id)->first();
		return \Redirect::route('admin_project_updates',$project->slug);
	}
	
	public function images($project_slug){
		$project = Project::where('slug','=',$project_slug)->first();
		return view('admin.project_images')->withproject_slug($project_slug)->withproject($project->toArray());
	}
	
	public function imagesData($project_slug){
		$project = Project::where('slug','=', $project_slug)->first();
		$datatable = \Datatables::of(ProjectImage::with('project')->where('projects_id','=',$project->id)->select('slug','created_at','title','image_small')->get())
		->addColumn('operation', function ($data) {
			return '<a href="'.\URL::route('admin_project_images_edit', $data->slug).'" class="btn btn-xs btn-warning datatable-operation-btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
					<a href="#" class="btn btn-xs btn-danger datatable-operation-btn" id="det'.$data->slug.'" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top"
						title="Are you sure to delete this?">
						<i class="fa fa-trash" aria-hidden="true"></i></a>
					<script type="text/javascript">
					 	$("#det'.$data->slug.'").popover({
					 		html: \'true\',
						    content : \'<a href="'.\URL::route('admin_project_images_delete', $data->slug).'">\'+
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
		->editColumn('date', function ($data) {
			return date('d M Y',strtotime($data->start_dt));
		})
		->removeColumn('slug')
		->removeColumn('project')
		->make(true);
		return $datatable;
	}
	
	public function imagesAdd($project_slug){
		$project = Project::where('slug','=',$project_slug)->first();
		return view('admin.project_images_form')->withproject_slug($project_slug)->withproject($project->toArray());
	}
	
	public function imagesSubmit($project_slug){
		$input = Input::all();
		$project_image = null;
		if($input['slug'] == '')
			$project_image = new ProjectImage;
		else
			$project_image = ProjectImage::where('slug','=',$input['slug'])->first();
		$project_image->title = $input['title'];
		$project_image->projects_id = $input['projects_id'];
		if($input['slug'] == '')
			$project_image->created_by = \Auth::id();
		$project_image->updated_by = \Auth::id();
		$image = Input::file('image');
		$filename = '';
		if($image){
			$destinationPath = 'upload/projects/large/';
			$filename = str_random(10).'.'.$image->getClientOriginalExtension();
			Input::file('image')->move($destinationPath, $filename);
			$img = \Image::make(\URL::asset('upload/projects/large/'.$filename))->resize(200, null, function ($constraint) {
				$constraint->aspectRatio();
			});
				$img->save('upload/projects/small/'.$filename);
				$project_image->image_large = $destinationPath.$filename;
				$project_image->image_small = 'upload/projects/small/'.$filename;
		}

		$project_image->save();
		return \Redirect::route('admin_project_images',$project_slug);
	}
	
	public function imagesEdit($slug){
		$project_image = ProjectImage::where('slug','=',$slug)->first();
		$project = Project::where('id','=',$project_image->projects_id)->first();
		return view('admin.project_images_form')->withproject($project->toArray())->withproject_image($project_image->toArray())->withproject_slug($project->slug);
	}
	
	public function imagesDelete($slug){
		$project_image = ProjectImage::where('slug','=',$slug)->first();
		if($project_image){
			$project_image->deleted_at = date('Y-m-d H:i:s');
			$project_image->save();
		}
		$project = Project::where('id','=',$project_image->projects_id)->first();
		return \Redirect::route('admin_project_images',$project->slug);
	}
	
	public function getProjects(){
		$projects = Project::paginate(9);
		if (\Request::ajax()) {
			return view('display.ajax.projects')->with('projects', $projects);
		}

		return view('display.projects')->with('projects', $projects);
	}
	
	public function getProjectsDetail($slug){
		$project = Project::where('slug','=',$slug)->first();
		return view('display.projects_detail')->with('project', $project);
	}
}
