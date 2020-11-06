<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('studentcode');
            $table->string('idcard', 13);
            $table->string('studentyear')->nullable();
            $table->string('type')->nullable();
          //  $table->enum('studentyearss',['k1','k2','k3','p1','p2','p3','p4','p5','p6'])->nullable();
            $table->enum('titlename',['เด็กชาย','เด็กหญิง','นาย','นางสาว','นาง']);
            $table->string('firstname');
            $table->string('lastname');
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
