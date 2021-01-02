<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
	use SoftDeletes;
    protected $table = 'gallerys';

	protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];
	public $timestamps = true;
}
