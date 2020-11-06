<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectYearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_years', function (Blueprint $table) {
            $table->id();
            $table->integer('years');
            $table->double('p1', 3, 2);
            $table->double('p2', 3, 2);
            $table->double('p3', 3, 2);
            $table->double('p4', 3, 2);
            $table->double('p5', 3, 2);
            $table->double('p6', 3, 2);
            $table->string('setting')->nullable();
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
        Schema::dropIfExists('subject_years');
    }
}
