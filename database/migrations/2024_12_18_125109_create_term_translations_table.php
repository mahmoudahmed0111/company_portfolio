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
        Schema::create('term_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('term_id')->constrained()->onDelete('cascade');
            $table->string('locale')->index();
            $table->text('term1')->nullable();
            $table->text('term2')->nullable();
            $table->text('term3')->nullable();
            $table->text('term4')->nullable();
            $table->text('term5')->nullable();
            $table->text('term6')->nullable();
            $table->text('term7')->nullable();
            $table->text('term8')->nullable();
            $table->text('term9')->nullable();
            $table->text('term10')->nullable();
            $table->timestamps();
            $table->unique(['term_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('term_translations');
    }
};
