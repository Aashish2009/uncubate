<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
class LeaderSpeak extends Model {

	protected $table = 'leaders_speak';

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