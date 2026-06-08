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
        Schema::table('project_requests', function (Blueprint $table) {
            $table->text('internal_notes')->nullable();
            $table->foreignId('assigned_to_id')->nullable()->constrained('users')->onDelete('set null');
            $table->integer('lead_value')->nullable();
        });

        Schema::table('contact_messages', function (Blueprint $table) {
            $table->text('internal_notes')->nullable();
            $table->foreignId('assigned_to_id')->nullable()->constrained('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('project_requests', function (Blueprint $table) {
            $table->dropForeign(['assigned_to_id']);
            $table->dropColumn(['internal_notes', 'assigned_to_id', 'lead_value']);
        });

        Schema::table('contact_messages', function (Blueprint $table) {
            $table->dropForeign(['assigned_to_id']);
            $table->dropColumn(['internal_notes', 'assigned_to_id']);
        });
    }
};
