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
            $table->string('contract_period')->after('type');
            $table->boolean('dinner')->default(false)->after('food_allowance');
            $table->boolean('stay')->default(false)->after('dinner');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employer_jobs', function (Blueprint $table) {
             $table->dropColumn('contract_period');  
             $table->dropColumn('dinner');  
             $table->dropColumn('contract_stayperiod');  
        });
    }
};
