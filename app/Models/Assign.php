<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assign extends Model
{
    protected $table = 'assigns';
	
	protected $hidden = [
    ];

	protected $guarded = [];

	protected $dates = ['deleted_at'];

	public function job()
	{
		return $this->belongsTo('App\Models\Job','job_id');
	}

}
