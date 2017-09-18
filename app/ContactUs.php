<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
class ContactUs extends Model {

	protected $table = 'contact_us';

	use SoftDeletes;
	use Sluggable;
   	protected $dates = ['deleted_at'];
   	
   	public function sluggable(){
   		return [
   			'slug' => [
   				'source' => 'name'
   			]
   		];
   	}
      

}