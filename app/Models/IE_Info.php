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

class IE_Info extends Model
{
    use SoftDeletes;
    
    protected $table = 'ie_infos';
    
    protected $hidden = [
    
    ];
    
    protected $guarded = [];
    
    protected $dates = ['deleted_at'];
    public function fcertificate()
    {
         return $this->belongsTo('App\Models\File','certificate');
    }
    public function fmcc()
    {
         return $this->belongsTo('App\Models\File','mcc');
    }
    public function fmgma()
    {
         return $this->belongsTo('App\Models\File','mgma');
    }
    public function fmia()
    {
         return $this->belongsTo('App\Models\File','mia');
    }
    public function fumfcci()
    {
         return $this->belongsTo('App\Models\File','umfcci');
    }
    public function fother()
    {
         return $this->belongsTo('App\Models\File','other');
    }
}
