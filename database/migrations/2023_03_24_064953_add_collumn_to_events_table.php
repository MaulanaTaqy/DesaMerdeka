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
        Schema::table('events', function (Blueprint $table) {
            $table->boolean('is_keynote')->default(0);
            $table->boolean('is_paid')->default(0);
            $table->string('video')->nullable();
            $table->text('fb_url')->nullable();
            $table->text('ig_url')->nullable();
            $table->text('yt_url')->nullable();
            $table->text('tk_url')->nullable();
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            //
        });
    }
};
