<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpregadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empregados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('apelido');
            $table->integer('bilhete');
            $table->string('email')->unique();
            $table->string('local_nascimento');
            $table->enum('sexo',['Masculino','Feminino','Não Especificado']);
            $table->enum('estado_civil',['Solteiro','Casado']);
            $table->integer('telefone');
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
        Schema::dropIfExists('empregados');
    }
}
