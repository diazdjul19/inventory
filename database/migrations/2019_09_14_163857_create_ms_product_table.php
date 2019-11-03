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
            $table->Increments('id_product');
            $table->integer('id_category');
            $table->string('product_name');
            $table->string('product_code');
            $table->string('product_photo');
            $table->date('registration_date');
            $table->date('pcs');


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
