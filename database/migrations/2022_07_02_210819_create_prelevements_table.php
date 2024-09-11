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
        Schema::create('prelevements', function (Blueprint $table) {
            $table->id();
            $table->integer('NumeroAnapath');
            $table->foreignId('Service_Id');
            $table->string('Organe');
            $table->date('DateManipulation');
            $table->string('Type');
            $table->foreignId('User_Id');
            $table->text('Description')->nullable();
            $table->integer('NombreBiopsie')->nullable();
            $table->integer('NombreBlocs');
            $table->timestamps();



            $table->foreign('Service_Id')->references('id')->on('services')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('User_Id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prelevements');
    }
};
