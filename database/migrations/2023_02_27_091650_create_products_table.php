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
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('member_id')->nullable()->constrained();
            $table->foreignUuid('admin_id')->nullable()->constrained();
            $table->foreignUuid('member_type_id')->constrained();
            $table->string('banner_image')->nullable();
            $table->string('image');
            $table->string('title');
            $table->text('desc')->nullable();
            $table->text('market_store_url')->nullable();
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
        Schema::dropIfExists('products');
    }
};
