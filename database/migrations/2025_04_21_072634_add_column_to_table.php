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
            $table->string('created_by')->nullable()->after('travel_allowance');
            $table->string('is_publish')->default(0)->after('created_by');
            $table->string('is_verified')->default(0)->after('is_publish');
            $table->string('is_delete')->default(0)->after('is_verified');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employer_jobs', function (Blueprint $table) {
            //
        });
    }
};
