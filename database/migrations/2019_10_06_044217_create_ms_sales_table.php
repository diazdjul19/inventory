<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMsSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ms_sales', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('no_invoice');
            $table->integer('item_id');
            $table->integer('customers');
            $table->string('qty');
            $table->string('item_price');
            $table->string('total_price');
            $table->string('satuan');
            $table->string('payment_nominal');
            $table->string('return_nominal');
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
        Schema::dropIfExists('ms_sales');
    }
}
