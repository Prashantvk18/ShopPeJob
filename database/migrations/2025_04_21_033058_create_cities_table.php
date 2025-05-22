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
        Schema::create('cities', function (Blueprint $table) {
            $table->id();  // Creates an unsignedBigInteger as the primary key
            $table->string('name');  // Column for the city name
            $table->unsignedBigInteger('state_id');  // Foreign key for the state

            // Define the foreign key constraint
            $table->foreign('state_id')
                ->references('id')  // References the 'id' column on 'states' table
                ->on('states')  // Refers to the 'states' table
                ->onDelete('cascade');  // Deletes cities if the associated state is deleted

            $table->timestamps();  // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
