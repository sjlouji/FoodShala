<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRestainfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restainfos', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('restarunt_id');
            $table->foreign('restarunt_id')->references('id')->on('restarunts')->onDelete('cascade');
            $table->string('state');
            $table->string('city');
            $table->string('pincode');
            $table->string('delivery_time');
            $table->string('rest_type');
            $table->enum('status_of_publishing', array('publish','discard'))->default('discard');
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
        Schema::dropIfExists('restainfos');
    }
}
