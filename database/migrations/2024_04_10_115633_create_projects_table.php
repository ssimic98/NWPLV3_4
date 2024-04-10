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
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('imeProjekta');
            $table->string('opisProjekta');
            $table->string('cijenaProjekta');
            $table->string('posaoObavljen');
            $table->string('datum_Pocetka');
            $table->string('datum_Zavrsetka');
            $table->string('Voditelj');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
