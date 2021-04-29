<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionarioModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionario_models', function (Blueprint $table) {
            $table->id();
            $table->string('cpf');
            $table->string('cargo');
            $table->string('nascimento');
            $table->string('cep');
            $table->string('rua');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('estado');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('admin_id')->nullable()->unsigned();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('admin_id')->references('id')->on('users');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcionario_models');
    }
}
