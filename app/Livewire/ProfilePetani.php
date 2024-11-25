<?php

namespace App\Livewire;

use App\Models\UploadPost;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfilePetani extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $role;
    public $profession;
    public $address;
    public $region;
    public $contact;
    public $successMessage;

    public $image;
    public $isEditable = false;

    protected $listeners = [
        'triggerEdit' => 'edit',
        'triggerDelete' => 'delete',
    ];

    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;
        $this->profession = $user->profession;
        $this->address = $user->address;
        $this->region = $user->region;
        $this->contact = $user->contact;
        $this->image = $user->image ?? null;
    }

    public function toggleEdit()
    {
        $this->isEditable = !$this->isEditable;
    }
    public function updateProfile()
    {
        $user = Auth::user();

        $this->validate([
            'image' => 'nullable|image|max:2048', // Maksimal 2MB
        ]);

        if ($this->image) {
            $validatedData['image'] = $this->image->store('profile-images/' . $user->id, 'public');

            $user->update(['image' => $validatedData['image']]);

            $this->image = $validatedData['image'];
        }

        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'profession' => $this->profession,
            'address' => $this->address,
            'region' => $this->region,
            'contact' => $this->contact,
        ]);

        $this->isEditable = false;
        $this->successMessage = "Profile updated successfully!";
    }


    public function render()
    {
        return view('livewire.profile-petani');
    }
}
