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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('Numero');
            $table->string('CIN');
            $table->string('Nom');
            $table->string('Prenom');
            $table->string('Adresse');
            $table->string('Tel');
            $table->string('Email');
            $table->string('cinrecto');
            $table->string('cinverso');
            $table->foreignId('employe_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
