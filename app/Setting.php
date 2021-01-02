<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

	protected $guarded = ['id', 'created_at', 'updated_at'];
	// protected $fillable = [];
	public $timestamps = true;
}
