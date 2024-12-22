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
        Schema::create('package_features_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_features_id')->constrained('package_features')->onDelete('cascade');
            $table->string('locale')->index();
            $table->string('feature');  // قد تحتاج إلى إضافة حقل آخر للترجمة أو التفاصيل.
            $table->timestamps();
            $table->unique(['package_features_id', 'locale']);
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_features_translations');
    }
};
