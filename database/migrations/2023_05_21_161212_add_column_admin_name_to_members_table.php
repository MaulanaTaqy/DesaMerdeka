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
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn('email_phone_director');
            $table->dropColumn('email_phone_admin');
            $table->dropColumn('comunity_name');
        });

        Schema::table('members', function (Blueprint $table) {
            $table->string('email_director')->nullable();
            $table->string('phone_director')->nullable();
            $table->string('email_admin')->nullable();
            $table->string('phone_admin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->string('email_phone_director')->nullable();
            $table->string('email_phone_admin')->nullable();
            $table->string('comunity_name')->nullable();
        });
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn('email_director');
            $table->dropColumn('phone_director');
            $table->dropColumn('email_admin');
            $table->dropColumn('phone_admin');
        });
    }
};
