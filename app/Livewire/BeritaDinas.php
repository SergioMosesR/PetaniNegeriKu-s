<?php

namespace App\Livewire;

use App\Models\BeritaDinas as ModelsBeritaDinas;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class BeritaDinas extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $user_id;
    public $title, $content, $image, $editMode = false, $beritaId;

    public function mount()
    {
        $this->user_id = Auth::user()->id;
    }

    public function store()
    {
        $validatedData = $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string|max:1000',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($this->image) {
            $validatedData['image'] = $this->image->store('uploads', 'public');
        }

        $validatedData['user_id'] = $this->user_id;

        ModelsBeritaDinas::create($validatedData);

        session()->flash('message', 'Berita berhasil dibuat!');
        $this->resetForm();
    }

    public function edit($id)
    {
        $berita = ModelsBeritaDinas::findOrFail($id);
        $this->beritaId = $berita->id;
        $this->title = $berita->title;
        $this->content = $berita->content;
        $this->image = $berita->image;
        $this->editMode = true;
    }

    public function update()
    {
        $validatedData = $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string|max:1000',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($this->image) {
            $validatedData['image'] = $this->image->store('uploads', 'public');
        }

        $berita = ModelsBeritaDinas::findOrFail($this->beritaId);
        $berita->update($validatedData);

        session()->flash('message', 'Berita berhasil diperbarui!');
        $this->resetForm();
    }

    public function delete($id)
    {
        ModelsBeritaDinas::destroy($id);
        session()->flash('message', 'Berita berhasil dihapus!');
    }

    public function resetForm()
    {
        $this->title = '';
        $this->content = '';
        $this->image = null;
        $this->editMode = false;
        $this->beritaId = null;
    }

    public function render()
    {
        $beritaDinas = ModelsBeritaDinas::where('user_id', Auth::user()->id)->paginate(5);
        return view('livewire.berita-dinas', ['beritaDinas' => $beritaDinas]);
    }
}
