<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('group_name');
            $table->string('group_icon');
            $table->boolean('is_sub_menu')->default(1);
            $table->integer('sl_order');
            $table->string('user_access')->default('1');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('group_menus');
    }
}
