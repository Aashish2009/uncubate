<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
class Blog extends Model {

	protected $table = 'blogs';

	use SoftDeletes;
	use Sluggable;
   	protected $dates = ['deleted_at'];
   	
   	public function sluggable(){
   		return [
   			'slug' => [
   				'source' => 'blog_title'
   			]
   		];
   	}
   	
   	public function images(){
   		return $this->hasMany('App\BlogImage', 'blogs_id', 'id');
   	}
}