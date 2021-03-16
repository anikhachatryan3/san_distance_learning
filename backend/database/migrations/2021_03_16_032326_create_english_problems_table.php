<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnglishAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('english_problems', function (Blueprint $table) {
            $table->id();
            $table->integer('assignment_id')->unsigned();
            $table->string('word');
            $table->string('url');
            $table->timestamps();

            $table->foreign('assignment_id')->references('id')->on('assignment')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('english_assignments');
    }
}
