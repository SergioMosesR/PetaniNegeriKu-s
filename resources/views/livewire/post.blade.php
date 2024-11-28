<div class="container mt-5">
    <!-- Success Alert -->
    @if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <!-- Error Alert -->
    @if (session()->has('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <!-- Form Input -->
    <form wire:submit.prevent="{{ $Update ? 'update' : 'store' }}" class="mb-5">
        <div class="row">
            <!-- Title Input -->
            <div class="mb-3 col-md-6">
                <label for="title" class="form-label">Post Title</label>
                <input type="text" wire:model='title' class="form-control" placeholder="Enter post title" id="title">
            </div>

            <!-- Content Input -->
            <div class="mb-3 col-md-6">
                <label for="content" class="form-label">Post Content</label>
                <textarea wire:model='content' class="form-control" placeholder="Enter post content"
                    id="content"></textarea>
            </div>

            <!-- Image Input -->
            <div class="mb-3 col-md-6">
                <label for="image" class="form-label">Post Image</label>
                <input type="file" wire:model='image' class="form-control" id="image">
            </div>

            <!-- Quantity Input -->
            <div class="mb-3 col-md-6">
                <label for="qty" class="form-label">Post Quantity</label>
                <input type="number" wire:model='qty' class="form-control" placeholder="Enter quantity" id="qty">
            </div>

            <!-- Unit Selection -->
            <div class="mb-3 col-md-6">
                <label for="unit" class="form-label">Post Unit</label>
                <select wire:model='unit' class="form-select" id="unit">
                    <option value="">Select Unit</option>
                    <option value="kg">Kg</option>
                </select>
            </div>

            <!-- Komoditas Selection -->
            <div class="mb-3 col-md-6">
                <label for="komoditas" class="form-label">Komoditas</label>
                <select wire:model='komoditas' class="form-select" id="komoditas">
                    <option value="">Pilih Komoditas</option>
                    <option value="Padi">Padi</option>
                    <option value="Jagung">Jagung</option>
                    <option value="Kelapa Sawit">Kelapa Sawit</option>
                    <option value="Kopi">Kopi</option>
                    <option value="Kakao">Kakao</option>
                    <option value="Karet">Karet</option>
                    <option value="Cengkeh">Cengkeh</option>
                    <option value="Lada">Lada</option>
                    <option value="Kayu Manis">Kayu Manis</option>
                    <option value="Rumput Laut">Rumput Laut</option>
                    <option value="Udang">Udang</option>
                    <option value="Ikan Tuna">Ikan Tuna</option>
                </select>
            </div>

            <!-- Price Input -->
            <div class="mb-3 col-md-6">
                <label for="price" class="form-label">Post Price</label>
                <input type="number" wire:model='price' class="form-control" placeholder="Enter price" id="price"
                    step="0.01">
            </div>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary w-100">{{ $Update ? 'Update Post' : 'Submit Post' }}</button>
    </form>

    <div class="row">
        @foreach ($posts as $post)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                @if ($post->image)
                <img src="{{ asset('storage/uploads/' . basename($post->image)) }}" class="card-img-top"
                    alt="Post Image">
                @endif

                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>

                    <p class="card-text text-truncate">{{ $post->content }}</p>

                    <p class="text-muted small">
                        Author: {{ $post->user->name }} <br>
                        Posted on: {{ $post->created_at->format('d-m-Y H:i') }}
                    </p>

                    <p class="text-muted small">
                        Komoditas: {{ $post->komoditas }} <br>
                        Qty: {{ $post->qty }} {{ $post->unit }} |
                        Price: Rp {{ number_format($post->price, 0, ',', '.') }}
                    </p>
                </div>

                <div class="card-footer d-flex justify-content-between">
                    <button wire:click="edit({{ $post->id }})" class="btn btn-sm btn-warning">Edit</button>
                    <button wire:click="delete({{ $post->id }})" class="btn btn-sm btn-danger">Delete</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center mt-4">
        {{ $posts->links('pagination::bootstrap-4') }}
    </div>
</div>
