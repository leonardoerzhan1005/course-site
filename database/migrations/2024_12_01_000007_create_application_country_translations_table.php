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
        Schema::create('application_country_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->constrained('application_countries')->onDelete('cascade');
            $table->string('locale', 5);
            $table->string('name');
            $table->timestamps();
            
            $table->unique(['country_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_country_translations');
    }
};
