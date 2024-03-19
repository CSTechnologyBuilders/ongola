<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historiques', function (Blueprint $table) {
            $table->string('id_historique')->primary();
            $table->string('action');
            $table->dateTime('heure_debut');
            $table->dateTime('heure_fin');
            $table->rememberToken()->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historiques');
    }
}
