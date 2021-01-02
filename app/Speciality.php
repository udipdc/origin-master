<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
	use SoftDeletes;
    protected $table = 'specialities';

	protected $guarded = ['id', 'created_at', 'updated_at'];
	// protected $fillable = [];
	public $timestamps = true;
}
