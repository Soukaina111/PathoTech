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
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Id_User');
            $table->string('Type_D');
            $table->string('Status')->default('En attente');
            $table->string('Commentaire_D')->nullable();
            $table->integer('Degree_Reinclusion')->nullable();
            $table->integer('Nombre_Recoupe')->nullable();
            $table->date('Date_Demande');
            $table->string('Type_Coloration')->nullable();
            $table->string('Panel_Marquage')->nullable();
            $table->timestamps();

            $table->foreign('Id_User')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demandes');
    }
};
