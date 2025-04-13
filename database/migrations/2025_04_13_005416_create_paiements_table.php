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
        
            Schema::create('paiements', function (Blueprint $table) {
                $table->id('id_paiement'); // ID personnalisé, sinon laisse juste ->id()
                $table->float('montant');
                $table->date('date_paiement');
        
                // Enum pour méthode de paiement (comme dans le diagramme)
                $table->enum('methode', ['Carte bancaire', 'Virement', 'PayPal']);
        
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
        Schema::dropIfExists('paiements');
    }
};
