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
        // Schema::table('event_speakers', function (Blueprint $table) {
        //     $table->dropForeign('event_speakers_event_id_foreign');
        // });

        Schema::dropIfExists('event_speakers');

        Schema::create('speakers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('title')->nullable();
            $table->string('image');
            $table->text('fb_url')->nullable();
            $table->text('ig_url')->nullable();
            $table->text('yt_url')->nullable();
        });

        Schema::create('event_speakers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('event_id')->constrained();
            $table->foreignUuid('speaker_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_speakers');
        Schema::dropIfExists('speakers');
    }

};
