<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->BigInteger('user')->nullable();
            $table->string('title', 50)->nullable();
            $table->string('slug')->unique()->nullable();
            $table->text('content')->nullable();
            $table->enum('status', array('draft', 'in progress', 'pending','assigned', 'rejected'))->index()->default('draft'); // *** fix this
            $table->BigInteger('parent')->nullable();
            $table->tinyInteger('type')->nullable();

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
        Schema::dropIfExists('posts');
    }
}
