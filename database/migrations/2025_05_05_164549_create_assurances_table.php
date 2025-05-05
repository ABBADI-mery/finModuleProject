<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssurancesTable extends Migration
{
    public function up()
    {
        Schema::create('assurances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reservation_id')->constrained()->onDelete('cascade');
            $table->string('type_assurance');
            $table->string('destination');
            $table->integer('duree');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('assurances');
    }
}