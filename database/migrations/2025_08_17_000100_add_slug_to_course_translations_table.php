<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('course_translations', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('title');
            $table->unique(['locale', 'slug'], 'course_translations_locale_slug_unique');
        });
    }

    public function down(): void
    {
        Schema::table('course_translations', function (Blueprint $table) {
            $table->dropUnique('course_translations_locale_slug_unique');
            $table->dropColumn('slug');
        });
    }
};


