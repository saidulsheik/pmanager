<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('status_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->date('start_date')->default('2019-12-01');
            $table->date('end_date')->default('2019-12-01');
            $table->boolean('status')->default(1);
            $table->unsignedBigInteger('user_id')->nullable();
           // $table->foreign('type_id')->references('id')->on('project_types');
            //$table->foreign('status_id')->references('id')->on('project_statuses');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });

        // Schema::table('projects', function($table){
        //     $table->foreign('type_id')
        //         ->references('id')->on('project_types')
        //         ->onDelete('cascade');

        //     $table->foreign('status_id')
        //         ->references('id')->on('project_statuses')
        //         ->onDelete('cascade');
        // });


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
