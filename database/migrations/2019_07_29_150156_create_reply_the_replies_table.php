<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReplyTheRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reply_the_replies', function (Blueprint $table) {
                $table->increments('id');

                $table->integer('user_id')->unsigned();
                $table->integer('discussion_id')->unsigned();
                $table->integer('replies_id')->unsigned();
                $table->text('conten');

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
        Schema::dropIfExists('reply_the_replies');
    }
}
