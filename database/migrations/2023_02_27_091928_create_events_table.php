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
        Schema::create('events', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('member_id')->nullable()->constrained();
            $table->foreignUuid('admin_id')->nullable()->constrained();
            $table->foreignUuid('member_type_id')->constrained();
            $table->string('image')->nullable();
            $table->string('title');
            $table->text('desc');
            $table->string('start_datetime');
            $table->string('end_datetime');
            $table->string('status_name')->nullable();
            $table->text('address');
            $table->boolean('is_approved')->default(0);
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
        Schema::dropIfExists('events');
    }
};
