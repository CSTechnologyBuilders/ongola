<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartenairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partenaires', function (Blueprint $table) {
            $table->string('id_partenaire')->primary();
            $table->string('nom');
            $table->string('adresse');
            $table->string('type');
            $table->string('cni');
            $table->string('logo')->nullable();
            $table->time('heure_ouverture')->nullable();
            $table->time('heure_fermeture')->nullable();
            $table->string('modelivraison')->nullable();
            $table->string('type_livraison')->nullable();
            $table->string('id_suivi');
            $table->foreign('id_suivi')->references('id_suivi')->on('suivie_livraisons')->onDelete('cascade');
            $table->string('id_historique');
            $table->foreign('id_historique')->references('id_historique')->on('historiques')->onDelete('cascade');
            $table->string('id_produit');
            $table->foreign('id_produit')->references('id_produit')->on('produits')->onDelete('cascade');
            
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
        Schema::dropIfExists('partenaires');
    }
}
