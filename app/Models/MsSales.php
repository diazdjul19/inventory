<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MsSales extends Model
{
    protected $guarded = [];


    public function product()
    {
        return $this->belongsTo(MsProduct::class,'item_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo( MsCustomer::class,'customers', 'id');
    }

    
}
