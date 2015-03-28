<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {
	
	protected $guarded = [];
	//
	
	protected $casts = [
    'completed' => 'boolean'
	];
	
	public function project()
	{
		return $this->belongsTo('App\Project');
	}
	
	public function worker()
	{
		return $this->hasMany('App/Worker');
	
	}

}
