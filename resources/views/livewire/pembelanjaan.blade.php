<div>
    <!-- Check if there are no posts -->
    @if($posts->isEmpty())
    <div class="alert alert-warning" role="alert">
        Tidak ada postingan.
    </div>
    @else
    <div class="row">
        @foreach ($posts as $post)
        <div class="col-md-3 mb-4">
            <div class="product-card">
                <!-- Product Image -->
                @if ($post->image)
                <img src="{{ asset('storage/uploads/' . basename($post->image)) }}" alt="{{ $post->title }}"
                    class="img-fluid">
                @endif

                <!-- Product Title -->
                <div class="product-title">
                    {{ $post->title }}
                </div>

                <!-- Product Price -->
                <div class="product-price">
                    Rp {{ number_format($post->price, 0, ',', '.') }}
                </div>

                <!-- Product Description (Content) -->
                <div class="product-content text-truncate">
                    {{ $post->content }}
                </div>

                <!-- Buy Button -->
                {{-- <button class="btn btn-primary w-100 mt-3" data-bs-toggle="modal"
                    data-bs-target="#postModal-{{ $post->id }}">
                    Buy
                </button> --}}
                <a href="{{route('BelanjaDetailPetani', ['id' => $post->id])}}">Buy</a>

            </div>
        </div>
        @endforeach
    </div>


    @endif

    <!-- Modal Template -->
    @foreach ($posts as $post)
    <div class="modal fade" id="postModal-{{ $post->id }}" tabindex="-1"
        aria-labelledby="postModalLabel-{{ $post->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="postModalLabel-{{ $post->id }}">{{ $post->title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row align-items-center">
                        <!-- Image Section -->
                        <div class="col-md-5 text-center">
                            <img src="{{ asset('storage/uploads/' . basename($post->image)) }} "
                                class="img-fluid rounded" alt="Post Image">
                        </div>

                        <!-- Details Section -->
                        <div class="col-md-7">
                            <p><strong>Description:</strong> {{ $post->content }}</p>
                            <p><strong>Price:</strong> Rp {{ number_format($post->price, 0, ',', '.') }}</p>
                            <p><strong>Qty Available:</strong> {{ $post->qty }} {{ $post->unit }}</p>

                            <form wire:submit.prevent="store({{$post->id}})">
                                <!-- Input for qty -->
                                <div class="mb-3">
                                    <label for="qty-{{ $post->id }}" class="form-label">Quantity</label>
                                    <input type="number" id="qty-{{ $post->id }}" wire:model="qty" class="form-control"
                                        min="1">
                                </div>

                                <!-- Unit options -->
                                <div class="mb-3">
                                    <label class="form-label">Unit</label>
                                    <div class="d-flex">
                                        <div class="form-check me-3">
                                            <input class="form-check-input" type="radio" wire:model="unit"
                                                id="kg-{{ $post->id }}" value="kg">
                                            <label class="form-check-label" for="kg-{{ $post->id }}">Kg</label>
                                        </div>
                                        <div class="form-check me-3">
                                            <input class="form-check-input" type="radio" wire:model="unit"
                                                id="kwt-{{ $post->id }}" value="kwt">
                                            <label class="form-check-label" for="kwt-{{ $post->id }}">KwT</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" wire:model="unit"
                                                id="ton-{{ $post->id }}" value="ton">
                                            <label class="form-check-label" for="ton-{{ $post->id }}">Ton</label>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" wire:model='postId'>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" data-bs-dismiss="modal" class="btn btn-primary">Confirm
                                        Purchase</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</div>