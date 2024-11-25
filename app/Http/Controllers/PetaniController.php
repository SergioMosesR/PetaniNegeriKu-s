<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetaniController extends Controller
{

    public function ProfilePetani(){
        return view('Petani.profile');
    }

    public function DashboardPetani(){
        return view('Petani.dashboard');
    }
}
