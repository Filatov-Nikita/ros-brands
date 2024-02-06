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
        Schema::create('attachments', function (Blueprint $table) {
            $table->id();

            $table->morphs('owner');
            $table->nullableMorphs('domain');
            $table->integer('width')->unsigned()->nullable();
            $table->integer('height')->unsigned()->nullable();
            $table->integer('size_in_bytes')->unsigned();
            $table->string('type');
            $table->string('media_type', 128);
            $table->string('disk');
            $table->string('path', 512);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attachments');
    }
};
