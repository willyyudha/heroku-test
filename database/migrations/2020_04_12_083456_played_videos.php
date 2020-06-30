<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PlayedVideos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('played_videos' , function (Blueprint $table){
            $table->increments('id');
            $table->integer('video_id')->unsigned();
            $table->integer('usercourse_id')->unsigned();
            $table->timestamps();
//            $table->foreign('video_id')->references('id')->on('videos')
//                ->onDelete('cascade');
//            $table->foreign('usercourse_id')->references('id')->on('users_courses')
//                ->onDelete('cascade');
//                ->onDelete('cascade');
        });

//        Schema::table('played_videos' , function (Blueprint $table){
//            $table->foreign('video_id')->references('id')->on('videos')
//                ->onDelete('cascade');
//        });

//        Schema::table('played_videos' , function (Blueprint $table){
//            $table->foreign('usercourse_id')->references('id')->on('users_courses')
//                ->onDelete('cascade');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('played_videos');
    }
}
