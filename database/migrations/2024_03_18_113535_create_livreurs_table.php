<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivreursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livreurs', function (Blueprint $table) {
            $table->string('id_livreur')->primary();
            $table->string('nom');
            $table->string('photo')->nullable();
            $table->string('cni');
            $table->string('photo_permi')->nullable();
            $table->string('situation_matrimoniale')->nullable();
            // $table->string('id_commande');
            // $table->foreign('id_commande')->references('id_commande')->on('commandes')->onDelete('cascade');
            $table->string('id_historique');
            $table->foreign('id_historique')->references('id_historique')->on('historiques')->onDelete('cascade');

            $table->rememberToken();
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
        Schema::dropIfExists('livreurs');
    }
}