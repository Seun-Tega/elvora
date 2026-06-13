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
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('author_role')->nullable();
            $table->string('author_avatar')->nullable();
            $table->string('category_label')->nullable();
            $table->string('heading_font')->default('Inter');
            $table->string('body_font')->default('Lora');
            $table->integer('reading_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn(['author_role', 'author_avatar', 'category_label', 'heading_font', 'body_font', 'reading_time']);
        });
    }
};
