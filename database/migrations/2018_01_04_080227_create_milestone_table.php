<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMilestoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('milestones', function (Blueprint $table) {
            $table->increments('id');
          //  $table->integer('emp_id')->unsigned();
            $table->integer('project_id')->unsigned();
          //  $table->foreign('emp_id')->references('id')->on('users');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->string('title');
            $table->string('description')->nullable();
            $table->integer('budget')->nullable();
            $table->string('currency')->nullable();
            $table->string('tasks')->nullable();
            $table->integer('mile_status')->nullable();
            $table->integer('payment_status')->nullable();
            $table->string('start_date',50)->nullable();
            $table->string('due_date',50)->nullable();
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
        Schema::dropIfExists('milestone');
    }
}
