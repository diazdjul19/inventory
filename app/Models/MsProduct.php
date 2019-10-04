<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MsProduct extends Model
{
    protected $guarded = [];

    // protected $primaryKey = 'id_product';

    public function category(){

        return $this->belongsTo(MsCategory::class,'id_category','id');
        
    }
}
