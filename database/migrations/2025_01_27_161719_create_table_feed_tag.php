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
        Schema::create('feed_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('feed_id')->constrained();
            $table->foreignId('tag_id')->constrained();
            $table->unique(['feed_id','tag_id']);
            $table->boolean('isActive')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feed_tag');
    }
};
