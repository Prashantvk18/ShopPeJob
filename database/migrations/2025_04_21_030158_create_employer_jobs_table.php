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
        Schema::create('employer_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('state');
            $table->string('city');
            $table->string('address');
            $table->enum('type', ['Full Time', 'Part Time', 'Contract']);
            $table->integer('employer_bond')->nullable();
            $table->integer('salary_min')->nullable();
            $table->integer('salary_max')->nullable();
            $table->text('description');
            $table->time('start_time');
            $table->time('end_time');
            $table->unsignedBigInteger('job_category');
            $table->string('company_name');
            $table->string('name');
            $table->string('phone_number');
            $table->boolean('food_allowance')->default(false);
            $table->boolean('travel_allowance')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employer_jobs');
    }
};
