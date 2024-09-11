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
        Schema::create('blocs', function (Blueprint $table) {
            $table->id();
            $table->string('Reference_Bloc');
            $table->foreignId('Prelevement_Id');
            $table->string('Commentaire')->nullable();
            $table->text('Siege')->nullable();
            $table->integer('Cassettes')->nullable();
            $table->integer('Fragments')->nullable();
            $table->string('Reste')->default('Non');
            $table->string('Decals')->default('Non');
            $table->boolean('Import')->default(0);
            $table->boolean('Status_D')->default(0);

            $table->foreign('Prelevement_Id')->references('id')->on('prelevements')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('blocs');
    }
};
