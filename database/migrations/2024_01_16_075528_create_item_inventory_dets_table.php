<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('item_inventory_dets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('head_id')->nullable();
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('location_id');
            $table->double('qty', 15, 2);
            $table->string('note', 100)->nullable();
            $table->dateTime('date')->nullable();
            $table->timestamps();
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
            $table->foreign('location_id')->references('id')->on('locations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_inventory_dets');
    }
};
