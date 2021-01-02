<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
   	protected $table = 'modules';

	protected $guarded = ['id', 'created_at', 'updated_at'];
	// protected $fillable = [];
	public $timestamps = true;
}
