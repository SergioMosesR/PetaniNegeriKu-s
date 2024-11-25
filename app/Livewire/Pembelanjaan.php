<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Pembelanjaan extends Component
{
    use WithPagination;
    public function render()
    {
        $posts = Post::with('user')->orderBy('title', 'asc')->paginate(18);
        return view('livewire.pembelanjaan', ['posts' => $posts]);
    }
}
