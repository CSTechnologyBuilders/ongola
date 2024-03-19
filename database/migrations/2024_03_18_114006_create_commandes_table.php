<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->string('id_commande')->primary(); // clé primaire non entière
            $table->string('id_admin');
            $table->string('id_partenaire');
            $table->string('statut');
            $table->string('etat');
            $table->foreign('id_admin')->references('id_admin')->on('users')->onDelete('cascade');
            $table->foreign('id_partenaire')->references('id_partenaire')->on('partenaires')->onDelete('cascade');
            $table->string('id_livreur')->nullable();
            $table->foreign('id_livreur')->references('id_livreur')->on('livreurs')->onDelete('cascade');
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
        Schema::dropIfExists('commandes');
    }
}
