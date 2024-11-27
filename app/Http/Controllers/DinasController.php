<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Undangan;
use Illuminate\Http\Request;

class DinasController extends Controller
{
    public function Dashboard()
    {
        return view('Dinas.dashboard');
    }

    public function BeritaDinas()
    {
        return view('Dinas.berita');
    }

    public function Undangan()
    {
        return view('Dinas.undangan');
    }

    public function DetailUndangan($id){
        $undangan = Undangan::findOrFail($id);
        return view('Dinas.detailUndangan', ['undangan' => $undangan]);
    }
}
