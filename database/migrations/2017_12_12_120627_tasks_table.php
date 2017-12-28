<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50)->nullable();
            $table->integer('project_id')->unsigned();
            $table->integer('assigned_to')->nullable();
            $table->integer('assigned_by')->nullable();
            $table->string('assigned_date',50)->nullable();
            $table->string('start_date',50)->nullable();
            $table->string('due_date',50)->nullable();
            $table->longText('description')->nullable();
            $table->longText('attachment')->nullable();
            $table->integer('status')->default('0');
            $table->timestamps();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
