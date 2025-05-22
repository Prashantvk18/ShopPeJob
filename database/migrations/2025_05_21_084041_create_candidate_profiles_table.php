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
        Schema::create('candidate_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('mobile_no');
            $table->string('dob');
            $table->string('gender');
            $table->string('address');
            $table->string('state');
            $table->string('city');
            $table->string('education');
            $table->string('work_experience');
            $table->string('looking_job');
            $table->string('salary_expect'); 
            $table->tinyInteger('got_job')->default(0);
            $table->tinyInteger('is_active')->default(0);
            $table->tinyInteger('is_verify')->default(0);
            $table->timestamps(); // created_at, updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_profiles');
    }
};
