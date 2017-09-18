<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
class Gallery extends Model {

	protected $table = 'gallery';

	use SoftDeletes;
	use Sluggable;
   	protected $dates = ['deleted_at'];
   	
   	public function sluggable(){
   		return [
   			'slug' => [
   				'source' => 'gallery_name'
   			]
   		];
   	}
   	
   	public function images(){
   		return $this->hasMany('App\GalleryImage', 'gallery_id', 'id');
   	}

}