<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ProjectMember extends Model {

	protected $table = 'project_members';

	use SoftDeletes;
   	protected $dates = ['deleted_at'];
   	
   	protected $fillable = ['projects_id', 'team_members_id'];
   	
   	public function project(){
   		return  $this->belongsTo('App\Project', 'projects_id');
   	}
   	
   	public function member(){
   		return  $this->belongsTo('App\TeamMember', 'team_members_id');
   	}
   	
}