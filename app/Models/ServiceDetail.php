<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceDetail extends Model
{
    use SoftDeletes;
    
    protected $table = 'servicedetails';
    
    protected $hidden = [
    
    ];
    
    protected $guarded = [];
    
    protected $dates = ['deleted_at'];

    public function service_data()
    {
        return $this->belongsTo('App\Models\File','file');
    }
}
