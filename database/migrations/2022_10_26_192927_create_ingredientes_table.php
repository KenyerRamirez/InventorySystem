<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredientes', function (Blueprint $table) {
            $table->id();
            $table->string('tipo',50);
            $table->string('descripcion1',50);
            $table->decimal('cantidad1',8,3);
            $table->string('descripcion2',50);
            $table->decimal('cantidad2',8,3);
            $table->string('descripcion3',50);
            $table->decimal('cantidad3',8,3);
            $table->string('descripcion4',50);
            $table->decimal('cantidad4',8,3);
            $table->string('descripcion5',50);
            $table->decimal('cantidad5',8,3);
            $table->string('descripcion6',50);
            $table->decimal('cantidad6',8,3);
            $table->string('descripcion7',50);
            $table->decimal('cantidad7',8,3);
            $table->string('descripcion8',50);
            $table->decimal('cantidad8',8,3);
            $table->string('descripcion9',50);
            $table->decimal('cantidad9',8,3);
            $table->string('descripcion10',50);
            $table->decimal('cantidad10',8,3);
            $table->string('descripcion11',50);
            $table->decimal('cantidad11',8,3);
            $table->string('descripcion12',50);
            $table->decimal('cantidad12',8,3);
            $table->string('descripcion13',50);
            $table->decimal('cantidad13',8,3);
            $table->string('descripcion14',50);
            $table->decimal('cantidad14',8,3);
            $table->string('descripcion15',50);
            $table->decimal('cantidad15',8,3);
            $table->decimal('precio_tot',8,2);
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
        Schema::dropIfExists('ingredientes');
    }
};
