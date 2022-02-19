<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->renameColumn('nama_lengkap', 'nama');
            $table->dropColumn('tempat_lahir');
            $table->dropColumn('alamat');
            $table->dropColumn('fakultas');
            $table->dropColumn('jurusan');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->renameColumn('nama', 'nama_lengkap');
            $table->string('alamat');
            $table->string('fakultas');
            $table->string('jurusan');
            $table->string('tempat_lahir');
        });
    }
}
