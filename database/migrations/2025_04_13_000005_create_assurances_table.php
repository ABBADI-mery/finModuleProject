<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('assurances', function (Blueprint $table) {
            $table->id(); // id auto-incrémenté
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_naissance');
            $table->integer('duree');
            $table->string('destination');
            $table->string('type_assurance');
            $table->timestamps(); // created_at et updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assurances');
    }
};
