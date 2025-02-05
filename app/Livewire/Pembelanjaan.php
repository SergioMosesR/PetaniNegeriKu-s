<?php

namespace App\Livewire;

use App\Models\Pembelanjaan as ModelsPembelanjaan;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Pembelanjaan extends Component
{
    use WithPagination;

    public $unit;
    public $qty;
    public $postId;

    public function render()
    {
        $posts = Post::with('user')->orderBy('title', 'asc')->paginate(15);
        return view('livewire.pembelanjaan', ['posts' => $posts]);
    }

    public function store($postId)
    {
        // Validasi input
        $this->validate([
            'qty' => 'required|integer|min:1',
        ]);

        // Pastikan user login
        $user = Auth::user();
        if (!$user) {
            session()->flash('error', 'Harap login untuk melanjutkan.');
            return;
        }

        // Cek validitas post
        $post = Post::find($postId);
        if (!$post) {
            session()->flash('error', 'Produk tidak ditemukan.');
            return;
        }


        $grandtotal = $this->qty * $post->price;

        // Simpan data pembelanjaan
        ModelsPembelanjaan::create([
            'id_penjual' => $post->user_id,
            'id_pembeli' => $user->id,
            'id_post' => $postId,
            'unit' => 'kg',
            'qty' => $this->qty,
            'grandtotal' => $grandtotal,
            'status' => 'pending', // Status default
        ]);

        // Berikan pesan sukses
        session()->flash('success', 'Pembelanjaan berhasil disimpan.');

        // Reset input setelah proses berhasil
        $this->reset(['unit', 'qty', 'postId']);
    }
}
