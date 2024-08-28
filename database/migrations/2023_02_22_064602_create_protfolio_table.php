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
        Schema::create('protfolio', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('client')->nullable();
            $table->string('technology')->nullable();
            $table->string('preview')->nullable();
            $table->integer('order_by')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('protfolio');
    }
};
