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
            $table->string('start_day')->nullable();
            $table->string('end_day')->nullable();
            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();
            $table->string('director_name')->nullable();
            $table->string('email_phone_director')->nullable();
            $table->string('domicile_director')->nullable();
            $table->string('administrator_name')->nullable();
            $table->string('email_phone_admin')->nullable();
            $table->string('domicile_admin')->nullable();
            $table->string('deed_number')->nullable();
            $table->string('notary_name')->nullable();
            $table->string('comunity_name')->nullable();
            $table->string('since')->nullable();
            $table->string('company_profile_file')->nullable();
            $table->string('org_structure_file')->nullable();
            $table->string('deed_file')->nullable();
            $table->string('approve_admin')->nullable();
            $table->string('google_plus_url')->nullable();
            $table->string('twitter_url')->nullable();
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
            //
        });
    }
};
