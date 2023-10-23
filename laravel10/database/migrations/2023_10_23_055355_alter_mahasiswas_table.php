<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->renameColumn('nama', 'nama_mahasiswa');
            $table->text('alamat')->after('tanggal_lahir');
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->renameColumn('nama_mahasiswa', 'nama');
            $table->dropColumn('alamat');
        });
    }
};
