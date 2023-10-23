<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Prodicontroller extends Controller
{
    public function index() {
        $kampus = "Universitas Multi Data Palembang";
        return view("prodi.index")->with('kampus', $kampus);
    }
}
