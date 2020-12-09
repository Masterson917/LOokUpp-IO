<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserLikes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('users', function (Blueprint $table) {
        Schema::create('Flags', function (Blueprint $table) {
            $table->integer('Flag_id')->unsigned();
            $table->integer('Flaged_user_id')->unsigned();

            $table->timestamps();

            $table->foreign('Flag_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('like_user_id')->references('id')->on('users')->onDelete('CASCADE');


            $table->primary(['Flag_id', 'Flaged_user_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Flags');
    }
}
