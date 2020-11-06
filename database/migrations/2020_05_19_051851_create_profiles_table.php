<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('birthday');
            $table->string('race');
            $table->string('nationality');
            $table->string('cult');
            $table->string('disease');
            $table->string('HomeID')->nullable();
            $table->string('moo')->nullable();
            $table->string('village')->nullable();
            $table->string('road')->nullable();
            $table->string('parish')->nullable();
            $table->string('district')->nullable();
            $table->string('province')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('father')->nullable();
            $table->string('father_tel')->nullable();
            $table->string('father_job')->nullable();
            $table->string('mother')->nullable();
            $table->string('mother_tel')->nullable();
            $table->string('mother_job')->nullable();
            $table->string('guardian')->nullable();
            $table->string('guardian_tel')->nullable();
            $table->string('guardian_job')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
