<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->date('date_depart')->nullable();
            $table->date('date_retour')->nullable();

            // ✅ Supprimer l'ancienne colonne
            $table->dropColumn('dateReservation');
        });
    }

    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropColumn(['date_depart', 'date_retour']);

            // ✅ Recréer la colonne supprimée si tu fais un rollback
            $table->date('dateReservation')->nullable();
        });
    }
};

