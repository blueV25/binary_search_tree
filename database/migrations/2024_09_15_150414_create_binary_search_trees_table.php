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
        Schema::create('binary_search_trees', function (Blueprint $table) {
            $table->id();
            $table->integer("value");
            $table->unsignedBigInteger('left_child_id')->nullable();
            $table->unsignedBigInteger('right_child_id')->nullable();
            $table->timestamps();

            $table->foreign('left_child_id')->references('id')->on('binary_search_trees')->onDelete('set null');

            $table->foreign('right_child_id')->references('id')->on('binary_search_trees')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('binary_search_trees');
    }
};
