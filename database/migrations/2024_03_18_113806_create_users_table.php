<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('id_admin')->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('type');
            $table->string('photo')->nullable();
            $table->string('password');
            $table->string('id_livreur')->nullable();
            $table->foreign('id_livreur')->references('id_livreur')->on('livreurs')->onDelete('cascade');
             $table->string('id_suivi')->nullable();
             $table->foreign('id_suivi')->references('id_suivi')->on('suivie_livraisons')->onDelete('cascade');
             $table->string('id_historique')->nullable();
             $table->foreign('id_historique')->references('id_historique')->on('historiques')->onDelete('cascade');
           
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('users');
    }
}
