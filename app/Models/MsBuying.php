<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MsBuying extends Model
{
    protected $guarded = [];

    public function supplier()
    {
        return $this->belongsTo(MsSupplier::class, 'supplier_id', 'id');
    }

    
    public function product()
    {
        return $this->belongsTo(MsProduct::class, 'item_id', 'id');
    }
}
