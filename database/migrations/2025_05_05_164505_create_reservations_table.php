<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nom');
            $table->string('email');
            $table->date('date_depart');
            $table->date('date_retour');
            $table->integer('nombre_passagers');
            $table->string('destination');
            $table->string('preference_vol');
            $table->string('preference_hotel');
            $table->text('demande_speciale')->nullable();
            $table->string('statut')->default('en attente');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}