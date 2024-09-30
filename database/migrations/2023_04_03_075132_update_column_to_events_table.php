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
            $table->dropColumn('is_keynote');
        });

        Schema::table('event_speakers', function (Blueprint $table) {
            $table->boolean('is_keynote')->default(0);
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
            $table->boolean('is_keynote')->default(0);
        });

        Schema::table('event_speakers', function (Blueprint $table) {
            $table->dropColumn('is_keynote');
        });
    }
};
