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
            $table->integer('jatah_awal')->nullable()->default(null);
            $table->integer('jatah_sisa')->nullable()->default(null);
            $table->integer('jan')->nullable()->default(null);
            $table->integer('feb')->nullable()->default(null);
            $table->integer('mar')->nullable()->default(null);
            $table->integer('apr')->nullable()->default(null);
            $table->integer('mei')->nullable()->default(null);
            $table->integer('jun')->nullable()->default(null);
            $table->integer('jul')->nullable()->default(null);
            $table->integer('agt')->nullable()->default(null);
            $table->integer('sep')->nullable()->default(null);
            $table->integer('okt')->nullable()->default(null);
            $table->integer('nov')->nullable()->default(null);
            $table->integer('des')->nullable()->default(null);
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
