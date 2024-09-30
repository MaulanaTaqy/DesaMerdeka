<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_configs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('logo_app')->nullable();
            $table->string('title')->nullable();
            $table->string('sub_title')->nullable();
            $table->string('desc')->nullable();
            $table->string('short_about_title')->nullable();
            $table->text('short_about_desc')->nullable();
            $table->string('short_about_image')->nullable();
            $table->text('address')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('fb_url')->nullable();
            $table->text('ig_url')->nullable();
            $table->text('yt_url')->nullable();
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
        Schema::dropIfExists('app_configs');
    }
};
