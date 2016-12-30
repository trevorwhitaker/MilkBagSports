<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkPostIdReplyId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function ($table) {
            $table->integer('post_id')->unsigned()->change();
            $table->integer('reply_id')->unsigned()->change();
        });

        Schema::table('comments', function($table)
        {
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('reply_id')->references('id')->on('comments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function ($table) {
            $table->integer('post_id')->change();
            $table->integer('reply_id')->change();
        });

        Schema::table('comments', function ($table) {
            $table->dropForeign('post_id');
            $table->dropForeign('reply_id');
        });
    }
}
