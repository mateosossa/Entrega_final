<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('nomina_id');
            $table->unsignedBigInteger('user_id');
            $table->string('nombre_usuario');
            $table->timestamp('fecha_realizacion');
            $table->decimal('monto_nomina', 8, 2);
            $table->timestamps();

            // Foreign keys
            $table->foreign('nomina_id')->references('id')->on('nominas')->onDelete('cascade');
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
        Schema::dropIfExists('informes');
    }
}
