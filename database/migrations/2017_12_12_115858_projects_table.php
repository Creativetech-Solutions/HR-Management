<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('client_id')->unsigned();
            $table->integer('budget')->nullable();
            $table->string('currency')->nullable();
            $table->integer('project_manager');// id
            $table->longText('required_skills')->nullable();
            $table->integer('project_status');
            $table->integer('payment_status');
            $table->string('start_date',50)->nullable();
            $table->string('due_date',50)->nullable();
            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
