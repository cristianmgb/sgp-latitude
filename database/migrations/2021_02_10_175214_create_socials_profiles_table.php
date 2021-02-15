<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialsProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socials_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('brand_id');
            $table->string('url_facebook')->nullable();
            $table->string('url_twitter')->nullable();
            $table->string('url_instagram')->nullable();
            $table->string('url_linkedin')->nullable();
            $table->string('url_youtube')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('brand_id')
                ->references('id')
                ->on('brands')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('socials_profiles');
    }
}
