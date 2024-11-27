<?php

namespace App\Livewire;

use App\Models\Undangan as ModelsUndangan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class Undangan extends Component
{
    use WithFileUploads;

    public $user_id, $title, $content, $penyelenggara, $waktu, $tempat, $image, $undanganId, $selectedUndangan = [];
    public $isEdit = false;

    public function mount()
    {
        $this->user_id = Auth::user()->id;
    }

    public function resetForm()
    {
        $this->isEdit = false;
        $this->undanganId = null;
        $this->title = '';
        $this->content = '';
        $this->penyelenggara = '';
        $this->waktu = '';
        $this->tempat = '';
        $this->image = null;
    }

    public function store()
    {
        $validatedData = $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string|max:1000',
            'penyelenggara' => 'required|string|max:255',
            'waktu' => 'required|date',
            'tempat' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($this->image) {
            $validatedData['image'] = $this->image->store('uploads', 'public');
        }

        $validatedData['user_id'] = $this->user_id;

        $undangan = ModelsUndangan::create($validatedData);

        $users = User::where('role', 'Petani')->get();

        foreach ($users as $user) {
            DB::table('undangan_users')->insert([
                'user_id' => $user->id,
                'undangan_id' => $undangan->id,
                'is_read' => false, // Default value for new notification
                'read_at' => null,  // Default value for new notification
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        session()->flash('success', 'Undangan berhasil dibuat!');
        $this->resetForm();
    }


    public function edit($id)
    {
        $undangan = ModelsUndangan::find($id);

        $this->isEdit = true;
        $this->undanganId = $id;
        $this->title = $undangan->title;
        $this->content = $undangan->content;
        $this->penyelenggara = $undangan->penyelenggara;
        $this->waktu = $undangan->waktu;
        $this->tempat = $undangan->tempat;
    }

    public function update()
    {
        $validatedData = $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string|max:1000',
            'penyelenggara' => 'required|string|max:255',
            'waktu' => 'required|date',
            'tempat' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($this->undanganId) {
            $post = ModelsUndangan::find($this->undanganId);

            if ($post) {
                if ($this->image) {
                    $validatedData['image'] = $this->image->store('uploads', 'public');
                } else {
                    unset($validatedData['image']);
                }

                $post->update($validatedData);

                session()->flash('success', 'Undangan updated successfully!');
                $this->resetForm();
            } else {
                session()->flash('error', 'Undangan not found!');
            }
        }
    }

    public function delete($id)
    {
        ModelsUndangan::find($id)->delete();
        session()->flash('success', 'Undangan berhasil dihapus!');
    }

    public function render()
    {
        $undangans = ModelsUndangan::where('user_id', $this->user_id)->get();
        return view('livewire.undangan', compact('undangans'));
    }
}
