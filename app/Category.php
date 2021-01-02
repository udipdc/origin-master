<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
	use SoftDeletes;
    protected $table = 'categories';

	protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];
	// protected $fillable = [];
	public $timestamps = true;

	/*public function Product()
	{
		return $this->hasMany('App\Product','category_id');
	}*/

}
