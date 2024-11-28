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

    public function resetForm()
    {
        $this->name = '';
        $this->description = '';
        $this->image = null;
    }

    public function Bergabung($komunitasId)
    {
        $user = Auth::user();

        $existingMembership = DetailKomunitas::where('id_user', $user->id)
            ->where('id_komunitas', $komunitasId)
            ->first();

        if ($existingMembership) {
            session()->flash('error', 'You are already a member of this community.');
            return;
        }

        DetailKomunitas::create([
            'id_user' => $user->id,
            'id_komunitas' => $komunitasId,
            'role' => 'member',
        ]);

        session()->flash('success', 'You have successfully joined the community!');
    }

    public function render()
    {
        $user = Auth::user();

        $Tersedia = DetailKomunitas::whereNull('id_user')
            ->orWhereNotIn('id_komunitas', function ($query) use ($user) {
                $query->select('id_komunitas')
                    ->from('detail_komunitas')
                    ->where('id_user', $user->id);
            })
            ->get()
            ->groupBy('id_komunitas') // Group by 'id_komunitas'
            ->map(function ($group) {
                return $group->first(); // Get the first record of each group
            });


        $komunitas = DetailKomunitas::where('id_user', $user->id)
            ->with('Komunitas')
            ->get();

        return view('livewire.komunitas', [
            'komunitas' => $komunitas,
            'Tersedia' => $Tersedia,
        ]);
    }
}
