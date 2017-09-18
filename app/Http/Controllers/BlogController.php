<?php namespace App\Http\Controllers;



use Bllim\Datatables\Facade\Datatables;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Blog;
use Illuminate\Support\Facades\Input;
class BlogController extends Controller {

	//use DispatchesCommands, ValidatesRequests;
	
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		return view('admin.blog');
	}
	
	public function data(){
		$datatable = \Datatables::of(Blog::select('slug','created_at','blog_title','blog_desc','blog_publish_date','blog_status','image_small','medium_link')->get())
			->addColumn('operation', function ($data) {
				return '<a href="'.\URL::route('admin_blog_edit', $data->slug).'" class="btn btn-xs btn-warning datatable-operation-btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
						<a href="#" class="btn btn-xs btn-danger datatable-operation-btn" id="det'.$data->slug.'" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top"
							title="Are you sure to delete this?">
							<i class="fa fa-trash" aria-hidden="true"></i></a>
						<script type="text/javascript">
						 	$("#det'.$data->slug.'").popover({
						 		html: \'true\',
							    content : \'<a href="'.\URL::route('admin_blog_delete', $data->slug).'">\'+
								    \'<button style="margin-left:9px;" type="button" class="btn btn-danger btn-xs">Yes</button></a>\'+
								    \'<button style="margin-left:20px;" type="button" class="btn btn-success btn-xs">No</button>\'
							  });
						</script>';
			})
			->editColumn('blog_publish_date', function ($data) {
				return date('d M Y h:i a',strtotime($data->blog_publish_date));
			})
			->editColumn('medium_link', function ($data) {
				return '<a target="_blank" href="'.$data->medium_link.'" class="btn btn-xs btn-warning datatable-operation-btn"><i class="fa fa-link" aria-hidden="true"></i></a>';
			})
			->editColumn('image_small', function ($data) {
				return '<img src="'.\URL::asset($data->image_small).'" style="max-width: 75px;" width="100%">';
			})
			->editColumn('created_at', function ($data) {
				return date('d M Y h:i a',strtotime($data->created_at));
			})
			->removeColumn('slug')
			->make(true);
		return $datatable;
	}
	
	public function add(){
		return view('admin.blog_form');
	}
	
	public function submit(){
		$input = Input::all();
		$blog = null;
		if($input['slug'] == '')
			$blog = new Blog;
		else 
			$blog = Blog::where('slug','=',$input['slug'])->first();
		$blog->blog_title = $input['blog_title'];
		$blog->blog_status = $input['blog_status'];
		$blog->blog_desc = $input['descr'];
		$blog->medium_link = $input['medium_link'];
		$arr1 = explode(' ', $input['blog_publish_date']);
		$sdt = explode('-', $arr1[0]);
		$blog->blog_publish_date = date('Y-m-d H:i:s', strtotime($sdt[2].'-'.$sdt[1].'-'.$sdt[0].' '.$arr1[1].' '.$arr1[2]));
		if($input['slug'] == '')
			$blog->created_by = \Auth::id();
		$blog->updated_by = \Auth::id();
		
		$image = Input::file('image');
		$filename = '';
		if($image){
			$destinationPath = 'upload/blog/large/';
			$filename = str_random(10).'.'.$image->getClientOriginalExtension();
			Input::file('image')->move($destinationPath, $filename);
			$img = \Image::make(\URL::asset('upload/blog/large/'.$filename))->resize(200, null, function ($constraint) {
				$constraint->aspectRatio();
			});
				$img->save('upload/blog/small/'.$filename);
				$blog->image_large = $destinationPath.$filename;
				$blog->image_small = 'upload/blog/small/'.$filename;
		}
		
		$blog->save();
		return \Redirect::route('admin_blog');
	}
	
	public function edit($slug){
		$blog = Blog::where('slug','=',$slug)->first();
		return view('admin.blog_form')->withblog($blog->toArray());
	}
	
	public function delete($slug){
		$blog = Blog::where('slug','=',$slug)->first();
		if($blog){
			$blog->deleted_at = date('Y-m-d H:i:s');
			$blog->save();
		}
		return \Redirect::route('admin_blog');
	}
	
	public function getBlogs(){
		$blogs = Blog::orderby('blog_publish_date','desc')->paginate(4);
		if (\Request::ajax()) {
			return view('display.ajax.blogs')->with('blogs', $blogs);
		}
		return view('display.blogs')->with('blogs', $blogs);
	}
	
	public function getBlogsDetail($slug){
		$blog = Blog::where('slug','=',$slug)->first();
		return view('display.blogs_detail')->with('blog', $blog);
	}
	
	/* public function images($blog_slug){
		$blog = Blog::where('slug','=',$blog_slug)->first();
		return view('admin.blog_images')->withblog_slug($blog_slug)->withblog($blog->toArray());
	}
	
	public function imagesData($blog_slug){
		$blog = Blog::where('slug','=', $blog_slug)->first();
		$datatable = \Datatables::of(BlogImage::where('blog_id','=',$blog->id)->select('slug','created_at','image_small','image_label')->get())
		->addColumn('operation', function ($data) {
			return '<a href="'.\URL::route('admin_blog_images_edit', $data->slug).'" class="btn btn-xs btn-warning datatable-operation-btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
					<a href="#" class="btn btn-xs btn-danger datatable-operation-btn" id="det'.$data->slug.'" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top"
						title="Are you sure to delete this?">
						<i class="fa fa-trash" aria-hidden="true"></i></a>
					<script type="text/javascript">
					 	$("#det'.$data->slug.'").popover({
					 		html: \'true\',
						    content : \'<a href="'.\URL::route('admin_blog_images_delete', $data->slug).'">\'+
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
		->removeColumn('blog')
		->make(true);
		return $datatable;
	}
	
	public function imagesAdd($blog_slug){
		$blog = Blog::where('slug','=',$blog_slug)->first();
		return view('admin.blog_images_form')->withblog_slug($blog_slug)->withblog($blog->toArray());
	}
	
	public function imagesSubmit($blog_slug){
		$input = Input::all();
		$blog_image = null;
		if($input['slug'] == '')
			$blog_image = new BlogImage;
		else
			$blog_image = BlogImage::where('slug','=',$input['slug'])->first();
		$blog_image->image_label = $input['image_label'];
		$blog_image->blog_id = $input['blog_id'];
		if($input['slug'] == '')
			$blog_image->created_by = \Auth::id();
		$blog_image->updated_by = \Auth::id();
		$image = Input::file('image');
		$filename = '';
		if($image){
			$destinationPath = 'upload/blog/large/';
			$filename = str_random(10).'.'.$image->getClientOriginalExtension();
			Input::file('image')->move($destinationPath, $filename);
			$img = \Image::make(\URL::asset('upload/blog/large/'.$filename))->resize(200, null, function ($constraint) {
				$constraint->aspectRatio();
			});
			$img->save('upload/blog/small/'.$filename);
			$blog_image->image_large = $destinationPath.$filename;
			$blog_image->image_small = 'upload/blog/small/'.$filename;
		}
	
		$blog_image->save();
		return \Redirect::route('admin_blog_images',$blog_slug);
	}
	
	public function imagesEdit($slug){
		$blog_image = BlogImage::where('slug','=',$slug)->first();
		$blog = Blog::where('id','=',$blog_image->blog_id)->first();
		return view('admin.blog_images_form')->withblog($blog->toArray())->withblog_image($blog_image->toArray())->withblog_slug($blog->slug);
	}
	
	public function imagesDelete($slug){
		$blog_image = BlogImage::where('slug','=',$slug)->first();
		if($blog_image){
			$blog_image->deleted_at = date('Y-m-d H:i:s');
			$blog_image->save();
		}
		$blog = Blog::where('id','=',$blog_image->blog_id)->first();
		return \Redirect::route('admin_blog_images',$blog->slug);
	} */
}
