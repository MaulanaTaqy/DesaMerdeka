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
        Schema::table('meta_event_categories', function (Blueprint $table) {
            $table->foreignUuid('member_id')->nullable()->constrained();
        });
        Schema::table('meta_blog_categories', function (Blueprint $table) {
            $table->foreignUuid('member_id')->nullable()->constrained();
        });
        Schema::table('meta_member_categories', function (Blueprint $table) {
            $table->foreignUuid('member_id')->nullable()->constrained();
        });
        Schema::table('meta_product_categories', function (Blueprint $table) {
            $table->foreignUuid('member_id')->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
