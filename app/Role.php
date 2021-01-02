<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
   	use SoftDeletes;
    protected $table = 'roles';

	protected $guarded = ['id', 'name', 'guard_name', 'created_at', 'updated_at'];
	// protected $fillable = [];
	public $timestamps = true;
}
