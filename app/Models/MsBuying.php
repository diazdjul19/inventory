<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MsBuying extends Model
{
    protected $guarded = [];

    public function name_supplier()
    {
        return $this->belongsTo(MsSupplier::class, 'supplier_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(MsProduct::class, 'item_id', 'id');
    }

    public function foto_product()
    {
        return $this->belongsTo(MsProduct::class, 'product_photo', 'id');
    }
}
