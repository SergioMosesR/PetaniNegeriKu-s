<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BeritaDinas;
use App\Models\Pembelanjaan;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetaniController extends Controller
{

    public function ProfilePetani()
    {
        return view('Petani.profile');
    }

    public function DashboardPetani()
    {
        return view('Petani.dashboard');
    }

    public function Pending()
    {
        $pending = Pembelanjaan::where('status', 'pending')
            ->where('id_penjual', Auth::user()->id)
            ->get();
        return view('Petani.pending', compact('pending'));
    }

    public function ProccessPending($id)
    {
        $pending = Pembelanjaan::findOrFail($id);

        $post = Post::findOrFail($pending->id_post);
        $qty = $post->qty - $pending->qty;

        $post->qty = $qty;
        $post->save();

        $pending->status = 'confirmed';
        $pending->save();

        return back()->with('success', 'Process Successfully');
    }

    public function DeletePending($id)
    {
        $pending = Pembelanjaan::findOrFail($id);
        $pending->delete();

        return back()->with('success', 'Pending Order Deleted');
    }

    public function BeritaDinas()
    {
        $BeritaDinas = BeritaDinas::paginate(5);
        return view('Petani.berita', compact('BeritaDinas'));
    }

    public function DetailBerita($id){
        $BeritaDinas = BeritaDinas::findOrFail($id);
        return view('Petani.detailBerita', compact('BeritaDinas'));
    }

}
