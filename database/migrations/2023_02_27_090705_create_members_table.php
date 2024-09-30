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
        Schema::create('members', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained();
            $table->foreignUuid('member_type_id')->constrained();
            $table->string('name');
            $table->string('website_url')->nullable();
            $table->text('desc')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->text('gmap_url')->nullable();
            $table->text('view_1_url')->nullable();
            $table->text('view_2_url')->nullable();
            $table->text('view_3_url')->nullable();
            $table->string('image')->nullable();
            $table->uuid('registered_by_member_id')->nullable();
            $table->string('registered_at');
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
        Schema::dropIfExists('members');
    }
};
