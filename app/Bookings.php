<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
class Bookings extends Model {

	protected $table = 'bookings';

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