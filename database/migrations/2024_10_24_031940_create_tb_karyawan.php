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
        Schema::create('tb_karyawan', function (Blueprint $table) {
            $table->id('id_karyawan');
            $table->string('nama_karyawan', 50);
            $table->string('nip', 15);
            $table->string('jabatan', 25);
            $table->text('alamat');
            $table->string('telp', 15);
            $table->string('email', 50);
            $table->text('foto');
            $table->string('created_by', 20);
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_karyawan');
    }
};
