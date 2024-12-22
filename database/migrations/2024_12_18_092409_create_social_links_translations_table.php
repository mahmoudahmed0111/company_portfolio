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
        Schema::create('social_links_translations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('social_links_id')->constrained('social_links')->onDelete('cascade');
            $table->string('locale');
            $table->timestamps();
            $table->unique(['social_links_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_links_translations');
    }
};
