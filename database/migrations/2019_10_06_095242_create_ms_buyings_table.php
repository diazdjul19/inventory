<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMsBuyingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ms_buyings', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('no_invoice');
            $table->integer('supplier_name');
            $table->integer('item_id');           
            $table->string('qty');           
            $table->string('item_price');
            $table->string('total_price_item');
            $table->string('total_all_price');
            $table->string('delivery_fee');
            $table->string('item_status');
            $table->string('satuan');
            $table->string('discounts_item');           
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ms_buyings');
    }
}
