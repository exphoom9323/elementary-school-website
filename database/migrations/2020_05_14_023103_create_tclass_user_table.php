<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTclassUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tclass_user', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->integer('user_id');
          $table->integer('tclass_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tclass_user', function (Blueprint $table) {
            //
        });
    }
}
