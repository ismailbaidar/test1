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
        Schema::create('equipemembers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('equipe_id')->nullable()->constrained();
            $table->foreignId('medecin_id')->nullable()->constrained();
            $table->foreignId('infermier_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipemembers');
    }
};
