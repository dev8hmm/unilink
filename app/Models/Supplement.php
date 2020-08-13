<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplement extends Model
{
    use SoftDeletes;
    
    protected $table = 'supplements';

    public function services()
    {
        $ids=json_decode($this->service);
        if($ids<>null)
        {
            $result = Service::whereIn('id', $ids)->get();
            return $result;
        }
        else{
            return null;
        }
        
    }
}
