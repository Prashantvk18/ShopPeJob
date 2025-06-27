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
        Schema::table('employer_jobs', function (Blueprint $table) {
            $table->string('from_date')->after('employer_bond');
            $table->string('to_date')->after('from_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employer_jobs', function (Blueprint $table) {
            $table->dropColumn('from_date');
            $table->dropColumn('to_date');
        });
    }
};
