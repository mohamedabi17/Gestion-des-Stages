<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id('etudiant_id');
            $table->string('name');
            // Add other columns as needed
            $table->timestamps();

            $table->unsignedBigInteger('user_id');

            // Foreign key constraint referencing the existing "users" table
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('CASCADE');

            $table->unsignedBigInteger('promotion_id')->nullable();

            
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('etudiants');
    }
};
