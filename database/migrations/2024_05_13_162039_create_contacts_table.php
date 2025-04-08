<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nome', 255);
            $table->string('email', 255);
            $table->string('telefone', 30);
            $table->string('cep', 10);
            $table->string('logradouro', 255);
            $table->string('numero', 15);
            $table->string('bairro', 255);
            $table->string('cidade', 255);
            $table->string('estado', 255);
            $table->string('pais', 255);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::table('contacts', function(Blueprint $table) {
            $table->dropForeign('contacts_user_id_foreign');
        });

        Schema::dropIfExists('contacts');

        Schema::enableForeignKeyConstraints();
    }
};
