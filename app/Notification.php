<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
	use SoftDeletes;
	protected $table = 'notifications';

	protected $guarded = ['id', 'created_at', 'updated_at'];
	protected $dates = ['deleted_at'];
	public $timestamps = true;

	public function RequriterUser()
	{
		return $this->belongsTo('App\User','recruiter_id','id');
	}

	public function AdminUser()
	{
		return $this->belongsTo('App\User','admin_id','id');
	}

	public function JobApplication()
	{
		return $this->belongsTo('App\JobApplication','job_app_id','id');
	}

}
