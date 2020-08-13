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

class Shipment extends Model
{
    use SoftDeletes;
    
    protected $table = 'shipments';
    
    protected $hidden = [
    
    ];
    
    protected $guarded = [];
    
    protected $dates = ['deleted_at'];

    public function pols()
    {
        return $this->belongsTo('App\Models\PortName','pol');
    }
    public function pods()
    {
        return $this->belongsTo('App\Models\PortName','pod');
    }
    public function lines($type)
    {
        $type=strtolower($type);
        if($type=="air" || $type=="airline")
        {
            return $this->belongsTo('App\Models\AirLine','line');
        }
        else {
            return $this->belongsTo('App\Models\ShippingLine','line');
        }
    }
}
