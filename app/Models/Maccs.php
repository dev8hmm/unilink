<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Maccs extends Model
{
    use SoftDeletes;
    
    protected $table = 'maccs';
    
    protected $hidden = [
    
    ];
    
    protected $guarded = [];
    
    protected $dates = ['deleted_at'];

    public function receipts()
    {
       return $this->belongsTo('App\Models\File','receipt');
    }
    public function ros()
    {
        return $this->belongsTo('App\Models\File','ro');
    }
    public function undertakingLetter()
    {
        return $this->belongsTo('App\Models\File','undertaking_letter');
    }
    public function physicalLetter()
    {
        return $this->belongsTo('App\Models\File','physical_letter');
    }
    public function customData()
    {
        return $this->belongsTo('App\Models\File','custom_data');
    }
}
