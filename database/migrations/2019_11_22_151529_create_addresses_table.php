<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('address');
            $table->text('address_extra')->nullable(); //this can be nullable

            $table->string('phone')->nullable();  //this can be nullable
            $table->string('name');
            $table->string('city');
            $table->string('region');
            $table->string('zip');
            $table->string('country');
            $table->boolean('is_main');
            $table->timestamps();

            // foreign keys
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
