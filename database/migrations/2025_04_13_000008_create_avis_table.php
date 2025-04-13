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

        Schema::create('avis', function (Blueprint $table) {
            $table->id('idAvis'); // Correspond à la clé primaire personnalisée dans ton modèle
            $table->text('contenu');
            $table->date('datePublication');
            $table->tinyInteger('note')->unsigned(); // Par exemple une note sur 5
            $table->unsignedBigInteger('client_id');
            $table->timestamps();

            // Clé étrangère vers les clients
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
        Schema::dropIfExists('avis');
    }
};
