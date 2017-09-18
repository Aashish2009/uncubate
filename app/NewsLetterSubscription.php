<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
class NewsLetterSubscription extends Model {

	protected $table = 'news_letter_subscription';

	use SoftDeletes;
   	protected $dates = ['deleted_at'];
}