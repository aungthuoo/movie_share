<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title')->index();
            $table->longText('summary')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('genres')->nullable();
            $table->string('author')->nullable()->index();
            $table->string('tags')->nullable()->index();
            $table->double('imdb_ratings')->default(5.0);
            $table->string('pdf_download_link')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
