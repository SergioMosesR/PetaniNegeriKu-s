<div>
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
                        Qty: {{ $post->qty }} {{ $post->unit }} |
                        Price: Rp {{ number_format($post->price, 0, ',', '.') }}
                    </p>
                </div>

                <!-- Buy Button with Modal Trigger -->
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#postModal{{ $post->id }}">
                    Buy
                </button>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Modal Template -->
    @foreach ($posts as $post)
    <div class="modal fade" id="postModal{{ $post->id }}" tabindex="-1" aria-labelledby="postModalLabel{{ $post->id }}"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="postModalLabel{{ $post->id }}">{{ $post->title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Display post content in larger view -->
                    <div class="mb-3">
                        <img src="{{ asset('storage/uploads/' . basename($post->image)) }}" class="img-fluid mb-3"
                            alt="Post Image">
                        <p><strong>Description:</strong> {{ $post->content }}</p>
                        <p><strong>Price:</strong> Rp {{ number_format($post->price, 0, ',', '.') }}</p>
                        <p><strong>Qty Available:</strong> {{ $post->qty }} {{ $post->unit }}</p>
                    </div>
                    <form wire:submit.prevent='StorePending'>
                        <!-- Input for qty -->
                        <div class="mb-3">
                            <label for="qty{{ $post->id }}" class="form-label">Quantity</label>
                            <input type="number" id="qty{{ $post->id }}" class="form-control" value="1" min="1"
                                max="{{ $post->qty }}">
                        </div>

                        <!-- Unit options -->
                        <div class="mb-3">
                            <label class="form-label">Unit</label>
                            <div class="d-flex">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="unit{{ $post->id }}"
                                        id="kg{{ $post->id }}" value="kg" checked>
                                    <label class="form-check-label" for="kg{{ $post->id }}">Kg</label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="unit{{ $post->id }}"
                                        id="kwt{{ $post->id }}" value="kwt">
                                    <label class="form-check-label" for="kwt{{ $post->id }}">KwT</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="unit{{ $post->id }}"
                                        id="ton{{ $post->id }}" value="ton">
                                    <label class="form-check-label" for="ton{{ $post->id }}">Ton</label>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Confirm Purchase</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</div>
