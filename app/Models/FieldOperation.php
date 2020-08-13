<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FieldOperation extends Model
{
    use SoftDeletes;
	
	protected $table = 'fieldoperations';
	
	protected $hidden = [
        
    ];

	protected $guarded = [];

	protected $dates = ['deleted_at'];

	public function file()
	{
			return $this->belongsTo('App\Models\File',"value");
	}
}
