<?php

namespace App\Livewire;

use App\Models\Post as ModelsPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Post extends Component
{
    use WithFileUploads, WithPagination;
    public $title, $content, $image, $qty, $unit, $price;
    public $Update = false;
    public $postIdToEdit = null;
    public $userId;

    public function render()
    {
        $Posts = ModelsPost::where('user_id', Auth::user()->id)->with('user')
            ->orderBy('title', 'asc')
            ->paginate(9);;
        return view('livewire.post', ['posts' => $Posts]);
    }

    public function mount()
    {
        $this->userId = Auth::id();
    }

    public function store()
    {
        $user = Auth::user();

        if (empty($user->address) || empty($user->region) || empty($user->contact)) {
            session()->flash('error', 'Mohon lengkapi data diri terlebih dahulu!');
            return;
        }

        $validatedData = $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string|max:1000',
            'image' => 'nullable|image|max:2048',
            'qty' => 'nullable|numeric|min:1',
            'unit' => 'nullable|string|in:kg,kwt,ton',
            'price' => 'nullable|numeric|min:1',
        ]);

        if ($this->image) {
            $validatedData['image'] = $this->image->store('uploads', 'public');
        }

        $validatedData['user_id'] = $this->userId;

        ModelsPost::create($validatedData);

        session()->flash('success', 'Post uploaded successfully!');
        $this->resetForm(); // Reset form setelah data tersimpan
    }

    public function edit($postId)
    {
        $post = ModelsPost::find($postId);

        if ($post) {
            // Isi nilai form dengan data yang akan diedit
            $this->title = $post->title;
            $this->content = $post->content;
            $this->image = null; // Reset image untuk pengeditan
            $this->qty = $post->qty;
            $this->unit = $post->unit;
            $this->price = $post->price;
            $this->postIdToEdit = $post->id;
            $this->Update = true;
        }
    }

    public function update()
    {
        $validatedData = $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string|max:1000',
            'image' => 'nullable|image|max:2048',
            'qty' => 'nullable|numeric|min:0',
            'unit' => 'nullable|string|in:kg,kwt,ton',
            'price' => 'nullable|numeric|min:0',
        ]);

        if ($this->postIdToEdit) {
            $post = ModelsPost::find($this->postIdToEdit);

            if ($post) {
                if ($this->image) {
                    $validatedData['image'] = $this->image->store('uploads', 'public');
                } else {
                    unset($validatedData['image']);
                }

                $post->update($validatedData);

                session()->flash('success', 'Post updated successfully!');
                $this->resetForm();
            } else {
                session()->flash('error', 'Post not found!');
            }
        }
    }


    public function delete($postId)
    {
        $post = ModelsPost::find($postId);

        if ($post) {
            $post->delete();
            session()->flash('success', 'Post deleted successfully!');
        }
    }


    public function resetForm()
    {
        $this->title = '';
        $this->content = '';
        $this->image = null;
        $this->qty = null;
        $this->unit = null;
        $this->price = null;
        $this->postIdToEdit = null;
        $this->Update = false; // Kembali ke mode submit baru
    }
}
