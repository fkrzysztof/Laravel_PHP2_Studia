<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOcenyM2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oceny', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('imie');
            $table->string('nazwisko');
            $table->string('przedmiot');
            $table->double('ocena');

            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oceny_m2');
    }
}
