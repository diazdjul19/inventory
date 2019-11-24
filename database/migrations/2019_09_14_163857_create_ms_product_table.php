<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMsProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ms_product', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('id_category');
            $table->string('product_name');
            $table->string('product_code');
            $table->string('item_price');
            $table->string('status');
            $table->string('stock');
            $table->string('product_photo');
            $table->date('registration_date');
            


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
        Schema::dropIfExists('ms_product');
    }
}
