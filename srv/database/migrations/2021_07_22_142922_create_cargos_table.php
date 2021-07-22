<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargosTable extends Migration
{
    public function up()
    {
        Schema::create('cargos', function (Blueprint $table) {
            $table->id();
            $table->integer('weight');
            $table->integer('volume');
            $table->jsonb('truck');
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->dateTime('deleted_at')->nullable()->index();

        });
    }

    public function down()
    {
        Schema::dropIfExists('cargos');
    }
}
