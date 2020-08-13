<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Compulsory extends Model
{
    use SoftDeletes;
    protected $table = 'compulsories';
    protected $hidden = [];
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function letterHead()
    {
        return $this->belongsTo('App\Models\File','letter_head');
    }
    public function billRegistration()
    {
        return $this->belongsTo('App\Models\File','bill_registration');
    }
    public function commericialInvoice()
    {
        return $this->belongsTo('App\Models\File','commericial_invoice');
    }
    public function packingList()
    {
        return $this->belongsTo('App\Models\File','packing_list');
    }
    public function saleContract()
    {
        return $this->belongsTo('App\Models\File','sale_contract');
    }
    public function Licence()
    {
        return $this->belongsTo('App\Models\File','licence');
    }
   
}
