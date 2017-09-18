<?php namespace App\Http\Controllers;



use Bllim\Datatables\Facade\Datatables;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Maatwebsite\Excel\Facades\Excel;
use App\Gallery;
use Illuminate\Support\Facades\Input;
use App\GalleryImage;
use App\GalleryVideo;
class GalleryController extends Controller {

	//use DispatchesCommands, ValidatesRequests;
	
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		return view('admin.gallery');
	}
	
	public function data(){
		$datatable = \Datatables::of(Gallery::select('slug','created_at','gallery_name')->get())
			->addColumn('operation', function ($data) {
				return '<a href="'.\URL::route('admin_gallery_edit', $data->slug).'" class="btn btn-xs btn-warning datatable-operation-btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
						<a href="#" class="btn btn-xs btn-danger datatable-operation-btn" id="det'.$data->slug.'" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top"
							title="Are you sure to delete this?">
							<i class="fa fa-trash" aria-hidden="true"></i></a>
						<script type="text/javascript">
						 	$("#det'.$data->slug.'").popover({
						 		html: \'true\',
							    content : \'<a href="'.\URL::route('admin_gallery_delete', $data->slug).'">\'+
								    \'<button style="margin-left:9px;" type="button" class="btn btn-danger btn-xs">Yes</button></a>\'+
								    \'<button style="margin-left:20px;" type="button" class="btn btn-success btn-xs">No</button>\'
							  });
						</script>';
			})
			->addColumn('gallery_content', function ($data) {
				return '<a href="'.\URL::route('admin_gallery_images', $data->slug).'" class="btn btn-xs btn-info datatable-operation-btn"><i class="fa fa-file-image-o" aria-hidden="true"></i> Images</a>
						<a href="'.\URL::route('admin_gallery_videos', $data->slug).'" class="btn btn-xs btn-info datatable-operation-btn"><i class="fa fa-file-video-o " aria-hidden="true"></i> Videos</a>';
			})
			->editColumn('created_at', function ($data) {
				return date('d M Y h:i a',strtotime($data->created_at));
			})
			->removeColumn('slug')
			->make(true);
		return $datatable;
	}
	
	public function add(){
		return view('admin.gallery_form');
	}
	
	public function submit(){
		$input = Input::all();
		$gallery = null;
		if($input['slug'] == '')
			$gallery = new Gallery;
		else 
			$gallery = Gallery::where('slug','=',$input['slug'])->first();
		$gallery->gallery_name = $input['gallery_name'];
		if($input['slug'] == '')
			$gallery->created_by = \Auth::id();
		$gallery->updated_by = \Auth::id();
		$gallery->save();
		return \Redirect::route('admin_gallery');
	}
	
	public function edit($slug){
		$gallery = Gallery::where('slug','=',$slug)->first();
		return view('admin.gallery_form')->withgallery($gallery->toArray());
	}
	
	public function delete($slug){
		$gallery = Gallery::where('slug','=',$slug)->first();
		if($gallery){
			$gallery->deleted_at = date('Y-m-d H:i:s');
			$gallery->save();
		}
		return \Redirect::route('admin_gallery');
	}
	
	public function images($gallery_slug){
		$gallery = Gallery::where('slug','=',$gallery_slug)->first();
		return view('admin.gallery_images')->withgallery_slug($gallery_slug)->withgallery($gallery->toArray());
	}
	
	public function imagesData($gallery_slug){
		$gallery = Gallery::where('slug','=', $gallery_slug)->first();
		$datatable = \Datatables::of(GalleryImage::where('gallery_id','=',$gallery->id)->select('slug','created_at','image_small','image_label')->get())
		->addColumn('operation', function ($data) {
			return '<!-- a href="'.\URL::route('admin_gallery_images_edit', $data->slug).'" class="btn btn-xs btn-warning datatable-operation-btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a -->
					<a href="#" class="btn btn-xs btn-danger datatable-operation-btn" id="det'.$data->slug.'" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top"
						title="Are you sure to delete this?">
						<i class="fa fa-trash" aria-hidden="true"></i></a>
					<script type="text/javascript">
					 	$("#det'.$data->slug.'").popover({
					 		html: \'true\',
						    content : \'<a href="'.\URL::route('admin_gallery_images_delete', $data->slug).'">\'+
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
		->removeColumn('image_label')
		->removeColumn('gallery')
		->make(true);
		return $datatable;
	}
	
	public function imagesAdd($gallery_slug){
		$gallery = Gallery::where('slug','=',$gallery_slug)->first();
		//return view('admin.gallery_images_form')->withgallery_slug($gallery_slug)->withgallery($gallery->toArray());
		return view('admin.gallery_images_form')->withgallery_slug($gallery_slug)->withgallery($gallery->toArray());
	}
	
	public function imagesSubmit($gallery_slug){
		$input = Input::all();
		$gallery_image = null;
		if($input['slug'] == '')
			$gallery_image = new GalleryImage;
		else
			$gallery_image = GalleryImage::where('slug','=',$input['slug'])->first();
		$gallery_image->image_label = $input['image_label'];
		$gallery_image->gallery_id = $input['gallery_id'];
		if($input['slug'] == '')
			$gallery_image->created_by = \Auth::id();
		$gallery_image->updated_by = \Auth::id();
		$image = Input::file('image');
		$filename = '';
		if($image){
			$destinationPath = 'upload/gallery/large/';
			$filename = str_random(10).'.'.$image->getClientOriginalExtension();
			Input::file('image')->move($destinationPath, $filename);
			$img = \Image::make(\URL::asset('upload/gallery/large/'.$filename))->resize(200, null, function ($constraint) {
				$constraint->aspectRatio();
			});
			$img->save('upload/gallery/small/'.$filename);
			$gallery_image->image_large = $destinationPath.$filename;
			$gallery_image->image_small = 'upload/gallery/small/'.$filename;
		}
	
		$gallery_image->save();
		return \Redirect::route('admin_gallery_images',$gallery_slug);
	}
	
	public function imagesUpload($gallery_id){
		$input = Input::all();
		
		$gallery_image = null;
		$gallery_image = new GalleryImage;
		$gallery_image->gallery_id = $gallery_id;
		$gallery_image->unique_id = uniqid();
		$gallery_image->created_by = \Auth::id();
		$gallery_image->updated_by = \Auth::id();
		$image = Input::file('file');
		$filename = '';
		if($image){
			$destinationPath = 'upload/gallery/large/';
			$filename = str_random(10).'.'.$image->getClientOriginalExtension();
			Input::file('file')->move($destinationPath, $filename);
			$img = \Image::make(\URL::asset('upload/gallery/large/'.$filename))->resize(200, null, function ($constraint) {
				$constraint->aspectRatio();
			});
			$img->save('upload/gallery/small/'.$filename);
			$gallery_image->image_large = $destinationPath.$filename;
			$gallery_image->image_small = 'upload/gallery/small/'.$filename;
		}

		$gallery_image->save();
		return '1';
	}
	
	public function imagesEdit($slug){
		$gallery_image = GalleryImage::where('slug','=',$slug)->first();
		$gallery = Gallery::where('id','=',$gallery_image->gallery_id)->first();
		return view('admin.gallery_images_form')->withgallery($gallery->toArray())->withgallery_image($gallery_image->toArray())->withgallery_slug($gallery->slug);
	}
	
	public function imagesDelete($slug){
		$gallery_image = GalleryImage::where('slug','=',$slug)->first();
		if($gallery_image){
			$gallery_image->deleted_at = date('Y-m-d H:i:s');
			$gallery_image->save();
		}
		$gallery = Gallery::where('id','=',$gallery_image->gallery_id)->first();
		return \Redirect::route('admin_gallery_images',$gallery->slug);
	}
	
	public function videos($gallery_slug){
		$gallery = Gallery::where('slug','=',$gallery_slug)->first();
		return view('admin.gallery_videos')->withgallery_slug($gallery_slug)->withgallery($gallery->toArray());
	}
	
	public function videosData($gallery_slug){
		$gallery = Gallery::where('slug','=', $gallery_slug)->first();
		$datatable = \Datatables::of(GalleryVideo::where('gallery_id','=',$gallery->id)
					->select('slug','created_at','gallery_video_url','gallery_video_title','gallery_video_desc')->get())
		->addColumn('operation', function ($data) {
			return '<a href="'.\URL::route('admin_gallery_videos_edit', $data->slug).'" class="btn btn-xs btn-warning datatable-operation-btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
					<a href="#" class="btn btn-xs btn-danger datatable-operation-btn" id="det'.$data->slug.'" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top"
						title="Are you sure to delete this?">
						<i class="fa fa-trash" aria-hidden="true"></i></a>
					<script type="text/javascript">
					 	$("#det'.$data->slug.'").popover({
					 		html: \'true\',
						    content : \'<a href="'.\URL::route('admin_gallery_videos_delete', $data->slug).'">\'+
							    \'<button style="margin-left:9px;" type="button" class="btn btn-danger btn-xs">Yes</button></a>\'+
							    \'<button style="margin-left:20px;" type="button" class="btn btn-success btn-xs">No</button>\'
						  });
					</script>';
		})
		->editColumn('created_at', function ($data) {
			return date('d M Y h:i a',strtotime($data->created_at));
		})
		->editColumn('gallery_video_url', function ($data) {
			return '<iframe height="140" width="200"
						src="'.$data->gallery_video_url.'">
					</iframe>';
		})
		->removeColumn('slug')
		->removeColumn('gallery')
		->make(true);
		return $datatable;
	}
	
	public function videosAdd($gallery_slug){
		$gallery = Gallery::where('slug','=',$gallery_slug)->first();
		return view('admin.gallery_videos_form')->withgallery_slug($gallery_slug)->withgallery($gallery->toArray());
	}
	
	public function videosSubmit($gallery_slug){
		$input = Input::all();
		$gallery_video = null;
		if($input['slug'] == '')
			$gallery_video = new GalleryVideo;
		else
			$gallery_video = GalleryVideo::where('slug','=',$input['slug'])->first();
		$gallery_video->gallery_video_url = $input['gallery_video_url'];
		$gallery_video->gallery_video_title = $input['gallery_video_title'];
		$gallery_video->gallery_video_desc = $input['gallery_video_desc'];
		$gallery_video->gallery_id = $input['gallery_id'];
		if($input['slug'] == '')
			$gallery_video->created_by = \Auth::id();
		$gallery_video->updated_by = \Auth::id();
		$gallery_video->save();
		return \Redirect::route('admin_gallery_videos',$gallery_slug);
	}
	
	public function videosEdit($slug){
		$gallery_video = GalleryVideo::where('slug','=',$slug)->first();
		$gallery = Gallery::where('id','=',$gallery_video->gallery_id)->first();
		return view('admin.gallery_videos_form')->withgallery($gallery->toArray())->withgallery_video($gallery_video->toArray())->withgallery_slug($gallery->slug);
	}
	
	public function videosDelete($slug){
		$gallery_video = GalleryVideo::where('slug','=',$slug)->first();
		if($gallery_video){
			$gallery_video->deleted_at = date('Y-m-d H:i:s');
			$gallery_video->save();
		}
		$gallery = Gallery::where('id','=',$gallery_video->gallery_id)->first();
		return \Redirect::route('admin_gallery_videos',$gallery->slug);
	}
}
