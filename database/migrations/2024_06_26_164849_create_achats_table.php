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
        Schema::create('achats', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class)->nullable()->constrained()->cascadeOnDelete();
            $table->string('produit');
            $table->string('image');
            $table->integer('quantité');
            $table->string('couleur');
            $table->string('taille');
            $table->integer('total');
            $table->timestamps();   
        });

        
        Schema::table('users', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Categorie::class)->nullable()->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achats');
    }
};
