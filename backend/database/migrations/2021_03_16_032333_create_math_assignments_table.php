<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMathAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('math_assignments', function (Blueprint $table) {
            $table->id();
            $table->integer('assignment_id');
            $table->integer('num1');
            $table->string('operator');
            $table->integer('num2');
            $table->timestamps();

            $table->foreign('assignment_id')->references('id')->on('assignments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('math_assignments');
    }
}
