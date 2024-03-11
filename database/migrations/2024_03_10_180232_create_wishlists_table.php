<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWishlistsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wishlists', function (Blueprint $table) {
            $table->id();
            $table->string('note')->nullable();
            $table->unsignedBigInteger('etudiant_id'); // Ensure it's unsigned

            // Foreign key constraint referencing the existing "etudiants" table
            $table->foreign('etudiant_id')
                ->references('etudiant_id')  // Assuming 'id' is the primary key of 'etudiants' table
                ->on('etudiants')
                ->onDelete('CASCADE');

            $table->unsignedBigInteger('offer_id'); // Ensure it's unsigned

            // Foreign key constraint referencing the existing "offers" table
            $table->foreign('offer_id')
                ->references('id')  // Assuming 'id' is the primary key of 'offers' table
                ->on('offers')
                ->onDelete('CASCADE');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wishlists');
    }
}
