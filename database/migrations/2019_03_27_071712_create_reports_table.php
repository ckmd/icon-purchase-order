<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_sbu');
            $table->integer('id_item');
            $table->integer('jatah_awal')->default(100);
            $table->integer('jatah_sisa')->nullable();
            $table->integer('januari')->nullable()->default(null);
            $table->integer('februari')->nullable()->default(null);
            $table->integer('maret')->nullable()->default(null);
            $table->integer('april')->nullable()->default(null);
            $table->integer('meu')->nullable()->default(null);
            $table->integer('juni')->nullable()->default(null);
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
        Schema::dropIfExists('reports');
    }
}
