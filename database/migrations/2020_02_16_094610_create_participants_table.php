<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_1');
            $table->string('name_2');
            $table->string('branch_1');
            $table->string('branch_2');
            $table->string('student_number_1');
            $table->string('student_number_2');
            $table->string('year_1');
            $table->string('year_2');
            $table->string('email_1');
            $table->string('email_2');
            $table->unsignedBigInteger('team_id');

            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
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
        Schema::dropIfExists('participants');
    }
}
