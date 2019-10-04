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

            $table->foreign("item_id")->references("id")->on("ms_products");
            $table->foreign("customers")->references("id")->on("ms_customers");
            $table->foreign("qty")->references("id")->on("ms_stocks");

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
