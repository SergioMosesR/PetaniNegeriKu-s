<?php

namespace App\Livewire;

use App\Models\DetailKomunitas;
use App\Models\Komunitas as ModelsKomunitas;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Komunitas extends Component
{
    use WithFileUploads;

    public $name, $description, $image;

    public function storeKomunitas()
    {
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($this->image) {
            $validatedData['image'] = $this->image->store('uploads', 'public');
        }

        $komunitas = ModelsKomunitas::create($validatedData);

        $id_user = Auth::user()->id;
        $id_komunitas = $komunitas->id;

        DetailKomunitas::create([
            'id_user' => $id_user,
            'id_komunitas' => $id_komunitas,
            'role' => 'creator'
        ]);

        session()->flash('success', 'Post uploaded successfully!');
        $this->resetForm();
    }

    public function resetForm(){
        $this->name = '';
        $this->description = '';
        $this->image = null;
    }

    public function render()
    {
        return view('livewire.komunitas');
    }
}
