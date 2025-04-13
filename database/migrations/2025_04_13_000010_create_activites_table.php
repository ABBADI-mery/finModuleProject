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
        Schema::create('activites', function (Blueprint $table) {
            $table->id('idActivite'); // Clé primaire personnalisée
            $table->string('nom');
            $table->text('description');
            $table->string('lieu');
            $table->foreignId('destination_id')->constrained('destinations')->onDelete('cascade'); // Clé étrangère avec relation de suppression en cascade
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activites');
    }
};
