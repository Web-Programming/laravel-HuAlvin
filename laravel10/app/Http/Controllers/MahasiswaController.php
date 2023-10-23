<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function insert() {
        $result = DB::insert('insert into mahasiswas (npm, nama_mahasiswa, tempat_lahir, tanggal_lahir, alamat, created_at) values (?, ?, ?, ?, ?, ?)', ['2226250103', 'Alvin Hujaya', 'Palembang', '2004-10-02', 'Jl Jend Sudirman', now()]);
        dumb($result);
    }

    public function update() {
        $result = DB::update('update mahasiswas set nama_mahasiswa = "Kevin", update_at = now() where npm = ?', ['2226250102']);
        dumb($result);
    }

    public function delete() {
        $result = DB::delete('delete from mahasiswas where npm = ?',['2226250103']);
        dumb($result);
    }

    public function select() {
        $kampus = "Universitas Multi Data Palembang";
        $result = DB::select('select * from mahasiswas');
        //dumb($result);
        return view('mahasiswa.index', ['allmahasiswa' => $result, 'kampus' => $kampus]);
    }

    public function insertQb() {
        $result = DB::table('mahasiswas')->insert(
            [
                'npm' => '2226250103',
                'nama_mahasiswa' => 'Alvin Hujaya',
                'tempat_lahir' => 'Palembang',
                'tanggal_lahir' => '2004-10-02',
                'alamat' => 'Jl Jend Sudirman',
                'created_at' => now()
            ]
        );
        dump($result);
    }

    public function updateQb() {
        $result = DB::table('mahasiswas')
        ->where('npm', '2226250103')
        ->update(
            [
                'nama_mahasiswa' => 'usman',
                'updated_at' => now()
            ]
        );
    dumb($result);
    }

    public function deleteQb() {
        $result = DB::table('mahasiswas')
        ->where('npm', '=', '2226250103')
        ->delete();
        dump($result);
    }

    public function selectQb() {
        $kampus = "Universitas Multi Data Palembang";
        $result = DB::table('mahasiswas')->get();
        return view('mahasiswa.index');
    }
    
    public function insertElq() {
        $mahasiswa = new Mahasiswa;
        $mahasiswa->npm = '2226250103';
        $mahasiswa->nama_mahasiswa = 'Alvin Hujaya';
        $mahasiswa->tempat_lahir = 'Palembang';
        $mahasiswa->tanggal_lahir = '2004-10-02';
        $mahasiswa->alamat = 'Jl Jend Sudirman';
        $mahasiswa->save();
        dumb($mahasiswa);
    }

    public function updateElq() {
        $mahasiswa = Mahasiswa::where('npm', '2226250103')->first();
        $mahasiswa->nama_mahasiswa = 'Kevin';
        $mahasiswa->save();
        dumb($mahasiswa);
    }

    public function deleteElq() {
        $mahasiswa = Mahasiswa::where('npm', '2226250103')->first();
        $mahasiswa->delete();
        dumb($mahasiswa);
    }

    public function SelectElq() {
        $kampus = "Universitas Multi Data Palembang";
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.index', ['allmahasiswa' => $mahasiswa, 'kampus' => $kampus]);
    }
}
