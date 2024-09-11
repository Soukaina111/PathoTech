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
        Schema::create('paniers', function (Blueprint $table) {
            $table->id();
            $table->string('Ref_Bloc')->nullable()->unique();
            $table->foreignId('Bloc_Id')->nullable();
            $table->foreignId('Decal_Id')->nullable();
            $table->timestamps();

            $table->foreign('Bloc_Id')->references('id')->on('blocs')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('Decal_Id')->references('id')->on('decals')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paniers');
    }
};
