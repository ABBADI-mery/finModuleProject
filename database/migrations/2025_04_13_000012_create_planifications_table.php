<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planifications', function (Blueprint $table) {
            $table->id();
            $table->date('dates_souhaitees');
            $table->string('nom');
            $table->string('email');
            $table->string('destination');
            $table->string('PréférencesHébergement')->nullable();
            $table->text('DemandesSpéciales')->nullable();
            $table->unsignedBigInteger('client_id');
            $table->timestamps();

            // Clé étrangère
            $table->foreign('client_id')->references('id')->on('utilisateurs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planifications');
    }
};
