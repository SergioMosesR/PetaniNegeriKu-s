<div class="container mt-5">
    @if (session()->has('message'))
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
    @elseif (session()->has('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
    @endif

    <!-- Form untuk membuat atau mengedit berita -->
    <div class="card mb-4">
        <div class="card-header">
            <h4>{{ $editMode ? 'Edit Berita' : 'Buat Berita' }}</h4>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="{{ $editMode ? 'update' : 'store' }}">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="title" class="form-label">Title Berita</label>
                        <input type="text" name="title" wire:model="title" class="form-control" id="title">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="image" class="form-label">Image Berita</label>
                        <input type="file" name="image" wire:model="image" class="form-control" id="image">
                    </div>

                    <div class="col-12 mb-3">
                        <label for="content" class="form-label">Content Berita</label>
                        <textarea name="content" wire:model="content" class="form-control" id="content" cols="30"
                            rows="10"></textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">{{ $editMode ? 'Perbarui Berita' : 'Buat Berita'
                    }}</button>
            </form>
        </div>
    </div>

    <!-- Menampilkan daftar berita -->
    <div class="row">
        @foreach ($beritaDinas as $berita)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5>{{ $berita->title }}</h5>
                </div>
                <div class="card-body">
                    <p>{{ Str::limit($berita->content, 100) }}</p>

                    @if ($berita->image)
                    <img src="{{ Storage::url($berita->image) }}" class="img-fluid mb-2"
                        style="max-width: 100%; height: auto;">
                    @endif

                    <button wire:click="edit({{ $berita->id }})" class="btn btn-warning btn-sm">Edit</button>
                    <button wire:click="delete({{ $berita->id }})" class="btn btn-danger btn-sm">Delete</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $beritaDinas->links() }}
    </div>
</div>
