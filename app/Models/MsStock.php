<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MsStock extends Model
{
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(MsProduct::class,'product_id', 'id');
    }



}
