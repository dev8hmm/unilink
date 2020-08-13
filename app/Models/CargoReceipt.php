<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CargoReceipt extends Model
{
    use SoftDeletes;
    
    protected $table = 'cargoreceipts';
    
    protected $hidden = [
    
    ];
    
    protected $guarded = [];
    
    protected $dates = ['deleted_at'];

    public function packingList()
    {
        return $this->belongsTo('App\Models\File','packing_list');
    }
    public function loadingPlan()
    {
        return $this->belongsTo('App\Models\File','loading_plan');
    }
}
