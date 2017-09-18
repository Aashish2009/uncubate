<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
class ProjectImage extends Model {

	protected $table = 'project_images';

	use SoftDeletes;
	use Sluggable;
   	protected $dates = ['deleted_at'];
   	
   	public function project(){
   		return  $this->belongsTo('App\Project', 'projects_id');
   	}
   	
   	public function sluggable(){
   		return [
   				'slug' => [
   						'source' => 'title'
   				]
   		];
   	}
}