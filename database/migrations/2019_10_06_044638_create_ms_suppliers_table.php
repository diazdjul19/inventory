<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMsSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ms_suppliers', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('supplier_name');
            $table->string('legal_name');
            $table->string('mobile_number');
            $table->string('email');
            $table->string('addres');
            $table->string('country');
            $table->string('zib_code');
            $table->string('bank_name');
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
        Schema::dropIfExists('ms_suppliers');
    }
}
