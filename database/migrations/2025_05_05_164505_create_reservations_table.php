<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('offre_id')->nullable()->constrained()->onDelete('set null');
            $table->string('nom');
            $table->string('email');
            $table->string('destination')->nullable();
            $table->string('preference_hotel')->nullable();
            $table->integer('nombre_passagers')->nullable();
            $table->date('date_depart');
            $table->date('date_retour');
            $table->text('demande_speciale')->nullable();
            $table->string('statut')->default('en attente');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};