<?php
/**
 * Model generated using LaraAdmin
 * Help: http://laraadmin.com
 * LaraAdmin is open-sourced software licensed under the MIT license.
 * Developed by: Dwij IT Solutions
 * Developer Website: http://dwijitsolutions.com
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use SoftDeletes;
    
    protected $table = 'jobs';
    
    protected $hidden = [
    
    ];
    
    protected $guarded = [];
    
    protected $dates = ['deleted_at'];

    public function customer()
    {
        return $this->belongsTo('App\Models\Company','customer_id');
    }
    public function impexp()
    {
        return $this->belongsTo('App\Models\Company','imp_exp_id');
    }
    public function shipment()
    {
      return $this->belongsTo('App\Models\Shipment','shipment_id');
    }
    public function custom_clearance_service()
    {
        return $this->belongsTo('App\Models\Service','custom_clearance');
    }
    public function trucking_service()
    {
        return $this->belongsTo('App\Models\Service','trucking');
    }
    public function supplement_service()
    {
        // return $this->belongsTo('App\Models\Service','supplement');
        return $this->belongsTo('App\Models\Supplement','supplement');
    }
    public function supplement()
    {
        return $this->belongsTo('App\Models\Supplement','supplement');
    }
    public function compulsory()
    {
        return $this->hasOne('App\Models\Compulsory','job_id');
    }
    public function service_details()
    {
        return $this->hasMany('App\Models\ServiceDetail','job_no');
    }
    public function maccs()
    {
        return $this->hasOne('App\Models\Maccs','job_id');
    }
    public function fieldoperation()
    {
        return $this->hasMany('App\Models\FieldOperation','job_id');
    }
    public function cargoreceipts()
    {
        return $this->hasOne('App\Models\CargoReceipt','job_id');
    }
    public function assign()
    {
        return $this->hasOne('App\Models\Assign','job_id');
    }
}
