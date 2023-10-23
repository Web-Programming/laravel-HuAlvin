<?php

use App\Http\Controllers\KurikulumController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dosen', function() {
    return view ('dosen');
});

Route::get('/dosen/index', function() {
    return view ('dosen.index');
});

Route::get('/fakultas', function () {
    // return view('fakultas.index', ["ilkom" => "Fakultas Ilmu Komputer dan Rekayasa"]);
    // return view ('fakultas.index', ["fakultas" => ["Fakultas Ilmu Komputer dan Rekayasa", "Fakultas Ilmu Ekonomi"]]);
    // return view('fakultas.index') ->with("fakultas", ["Fakultas Ilmu Komputer dan Rekayasa", "Fakultas Ilmu Ekonomi"]);
    $kampus = "Universitas Multi Data Palembang";
    // $fakultas = [];
    $fakultas = ["Fakultas Ilmu Komputer dan Rekayasa", "Fakultas Ilmu Ekonomi"];
    return view('fakultas.index', compact('fakultas', 'kampus'));
});

Route::get('/prodi', [Prodicontroller::class, 'index']);
Route::resource("/kurikulum", KurikulumController::class);

//tes di browser dengan mengunjungi
//1. http://localhost:8000/kurikulum/
//2. http://localhost:8000/kurikulum/create
//3. http://localhost:8000/kurikulum/1000
//4. http://localhost:8000/kurikulum/1000/edit

Route::apiResource("/dosen", DosenController::class);

//tes di browser dengan mengunjungi
//1. http://localhost:8000/dosen/

Route::get('/mahasiswa/insert', [MahasiswaController::class, 'insert']);
Route::get('/mahasiswa/update', [MahasiswaController::class, 'update']);
Route::get('/mahasiswa/delete', [MahasiswaController::class, 'delete']);
Route::get('/mahasiswa/select', [MahasiswaController::class, 'select']);

//Jalankan Method Index()
//1. http://127.0.0.1:80/mahasiswa/insert

Route::get('/mahasiswa/insert-qb', [MahasiswaController::class, 'insertQb']);
Route::get('/mahasiswa/update-qb', [MahasiswaController::class, 'updateQb']);
Route::get('/mahasiswa/delete-qb', [MahasiswaController::class, 'deleteQb']);
Route::get('/mahasiswa/select-qb', [MahasiswaController::class, 'selectQb']);
    
Route::get('/mahasiswa/insert-elq', [MahasiswaController::class, 'insertElq']);
Route::get('/mahasiswa/update-elq', [MahasiswaController::class, 'updateElq']);
Route::get('/mahasiswa/delete-elq', [MahasiswaController::class, 'deleteElq']);
Route::get('/mahasiswa/select-elq', [MahasiswaController::class, 'selectElq']);