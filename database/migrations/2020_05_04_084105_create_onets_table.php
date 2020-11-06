<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('onets', function (Blueprint $table) {
            $table->id();
            $table->integer('subject_year_id');
            $table->double('thai', 5, 2)->nullable();
            $table->double('eng', 5, 2)->nullable();
            $table->double('mathematics', 5, 2)->nullable();
            $table->double('science', 5, 2)->nullable();
            $table->double('allthai', 5, 2)->nullable();
            $table->double('alleng', 5, 2)->nullable();
            $table->double('allmathematics', 5, 2)->nullable();
            $table->double('allscience', 5, 2)->nullable();
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
        Schema::dropIfExists('onets');
    }
}
