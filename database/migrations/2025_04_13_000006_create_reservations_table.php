<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropColumn('dateReservation');
        });
    }

    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->date('dateReservation')->nullable();
        });
    }
}
