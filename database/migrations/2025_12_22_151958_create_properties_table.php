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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Le propriétaire/manager
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('address'); // Nom -> title? English translation: 'nom' -> 'name' or 'title'. User said "appartement ou un bien_immobilier". Let's stick to generic English for code: 'title', 'address'. As requested "utilise les nom des fichiers doivent etre en anglais". I will also translate columns to English to be consistent.
            $table->string('city'); 
            $table->string('postal_code');
            $table->string('type'); // Appartement, Maison... (values can stay in French or English, code should be English)
            $table->decimal('surface', 10, 2); 
            $table->decimal('price', 10, 2); // loyer -> price
            $table->boolean('furnished')->default(false); // meuble -> furnished
            $table->enum('status', ['available', 'rented', 'maintenance'])->default('available'); // statut -> status
            $table->string('image')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
