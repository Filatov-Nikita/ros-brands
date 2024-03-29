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
            $table->id();
            $table->string('name');
            $table->string('consist', 512);
            $table->text('description');
            $table->integer('price')->unsigned();
            $table->integer('priority')->default(0);
            $table->boolean('visible')->default(true);

            $table->foreignId('product_category_id')
                ->constrained()
                ->restrictOnDelete();

            $table->foreignId('brand_id')
                ->constrained()
                ->restrictOnDelete();

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
