<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date')->default(date('Y-m-d H:i:s'));
            $table->string('content');

            $table->foreignId('post_id')
                ->references('id')
                ->on('posts');

            $table->foreignId('reader_id')
                ->references('id')
                ->on('readers');
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->foreignId('reply_comment')
                ->nullable(true)
                ->references('id')
                ->on('comments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
