<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
class FrontVideoText extends Model {

	protected $table = 'front_video_text';

	use SoftDeletes;
   	protected $dates = ['deleted_at'];
   	
}