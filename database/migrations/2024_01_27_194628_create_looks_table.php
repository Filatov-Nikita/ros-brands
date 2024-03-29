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
        Schema::create('looks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->integer('priority')->default(0);
            $table->boolean('visible')->default(true);

            $table->foreignId('look_category_id')
                ->constrained()
                ->restrictOnDelete();

            $table->foreignId('look_color_id')
                ->constrained()
                ->restrictOnDelete();

            $table->foreignId('designer_id')
                ->nullable()
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
        Schema::dropIfExists('looks');
    }
};
