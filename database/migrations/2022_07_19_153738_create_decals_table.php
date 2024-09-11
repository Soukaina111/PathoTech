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
        Schema::create('decals', function (Blueprint $table) {
            $table->id();
            $table->string('Reference_Decal')->unique();
            $table->foreignId('Bloc_Id');
            $table->foreignId('Prelevement_Id');
            $table->boolean('Import')->default(0);
            $table->timestamps();

            $table->foreign('Bloc_Id')->references('id')->on('blocs')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('Prelevement_Id')->references('id')->on('prelevements')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('decals');
    }
};
