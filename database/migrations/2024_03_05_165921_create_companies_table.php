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
        // Create the "entreprise" table first
        Schema::create('entreprises', function (Blueprint $table) {
            $table->id('entreprise_id');
            $table->string('name')->unique(); // Add a column for the company name
            $table->string('secteur')->nullable(); // Add a column for the industry the company belongs to
            $table->timestamps();

        });
     
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('entreprises');
    }
};
