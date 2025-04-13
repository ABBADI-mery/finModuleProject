<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id('idReservation');
            $table->string('nom');
            $table->date('dateReservation');
            $table->enum('statut', ['en attente', 'confirmée', 'annulée']);
            $table->integer('nbPassagers');
            $table->text('DemandeSpeciale')->nullable();
            $table->text('PréférencesVol')->nullable();
            $table->text('PréférencesHôtel')->nullable();
            $table->unsignedBigInteger('paiement_id');
            $table->unsignedBigInteger('assurance_id');
            $table->unsignedBigInteger('client_id');
            $table->timestamps();

           // $table->foreign('paiement_id')->references('id')->on('paiements')->onDelete('cascade');
           // $table->foreign('assurance_id')->references('id')->on('assurances')->onDelete('cascade');
            //$table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};
