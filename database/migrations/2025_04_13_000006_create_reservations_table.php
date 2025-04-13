<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id(); // ID auto-incrémenté
            $table->string('nom'); // Nom du client
            $table->string('email'); // Email du client
            $table->date('date_depart'); // Date de départ
            $table->date('date_retour'); // Date de retour
            $table->integer('nombre_passagers'); // Nombre de passagers
            $table->string('destination'); // Destination
            $table->string('preference_vol'); // Préférence de vol
            $table->string('preference_hotel'); // Préférence d'hôtel
            $table->text('demande_speciale')->nullable(); // Demande spéciale, nullable
            $table->timestamps(); // Création et mise à jour de l'horodatage
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
