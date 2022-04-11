<?php

// Facades.
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

            // Generate ID.
            $table->id();

            // Relations.
            $table->bigInteger('administrator_id')->unsigned()->index();
            $table->foreign('administrator_id')->references('id')->on('administrators')->onDelete('cascade');

            $table->bigInteger('category_id')->unsigned()->index();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            // Table content.
            $table->string('slug')->unique();
            $table->text('title');
            $table->text('intro');
            $table->text('content');

            $table->string('og_title')->unique();
            $table->text('og_description');
            $table->string('og_url')->unique();
            $table->string('og_type')->default('article');
            $table->string('og_locale')->default('nl_NL');

            $table->boolean('published');
            $table->dateTime('published_at');
            $table->dateTime('unpublished_at')->nullable();

            // Generate timestamps (created_at, updated_at)
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
