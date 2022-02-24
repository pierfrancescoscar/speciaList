<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45);
            $table->string('surname', 45);
            $table->string('slug', 150);
            $table->text('curriculum');
            $table->string('phone_number', 20);
            $table->string('email', 255);
            $table->text('medical_service');
            $table->text('description');
            $table->string('address', 200);
            $table->text('profile_pic');
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
        Schema::dropIfExists('doctors');
    }
}
