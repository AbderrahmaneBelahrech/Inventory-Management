<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApproproduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approproduits', function (Blueprint $table) {
            $table->id();
            $table->Integer('quantiteApp');
            $table->unsignedBigInteger('approvisionnement_id');
            $table->foreign('approvisionnement_id')->references('id')->on('approvisionnements');
            $table->unsignedBigInteger('produit_id');
            $table->foreign('produit_id')->references('id')->on('produits');
            $table->timestamps();
        });
    }
    // quantiteApp
    // approvisionnement_id
    // produit_id
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('approproduits');
    }
}
