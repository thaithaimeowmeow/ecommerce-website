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
        Schema::create('products', function (Blueprint $table) {
            $table->text('sku')->nullable();;
            $table->text('name')->nullable();;
            $table->text('cpu')->nullable();
            $table->text('monitor')->nullable();
            $table->text('ram')->nullable();
            $table->text('gpu')->nullable();
            $table->text('storage')->nullable();
            $table->text('os')->nullable();
            $table->text('battery')->nullable();
            $table->text('weight')->nullable();
            $table->text('thumbnail')->nullable();
            $table->text('displayImage')->nullable();

            $table->integer('price')->nullable();
            $table->integer('display_price')->nullable();
            $table->integer('quanity')->default(1);

            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
