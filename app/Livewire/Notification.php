<?php

namespace App\Livewire;

use App\Models\Undangan;
use App\Models\UndanganUser;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Notification extends Component
{
    public $selectedUndangan;
    public $showModal = false;
    public function showDetail($id)
    {
        $this->selectedUndangan = Undangan::find($id);
        $this->showModal = true;

        $undanganUser = UndanganUser::where('user_id', Auth::user()->id)
            ->where('undangan_id', $id)
            ->first();
        if ($undanganUser && !$undanganUser->is_read) {
            $undanganUser->update([
                'is_read' => 1,
                'read_at' => now(),
            ]);
        }
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->selectedUndangan = null;
    }

    public function render()
    {
        $undangan = UndanganUser::where('user_id', Auth::user()->id)
            ->with('undangan')
            ->orderBy('is_read', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('livewire.notification', ['undangan' => $undangan]);
    }
}
