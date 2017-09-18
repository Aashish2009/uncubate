<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
class Project extends Model {

	protected $table = 'projects';

	use SoftDeletes;
	use Sluggable;
   	protected $dates = ['deleted_at'];
   	
   	public function sluggable(){
   		return [
   			'slug' => [
   				'source' => 'project_title'
   			]
   		];
   	}
   	
   	public function members(){
   		return $this->hasMany('App\ProjectMember', 'projects_id', 'id');
   	}
}