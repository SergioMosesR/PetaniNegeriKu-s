<div class="container mt-5">
    <h1 class="mb-4 text-center">Komunitas || Petani NegeriKu</h1>

    <!-- Card Section with Two Columns -->
    <div class="row">
        <!-- Column for Komunitas Anda (Your Communities) -->
        <div class="col-md-6">
            <div class="card p-4 shadow-sm">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="m-0">Komunitas Anda</h2>
                    <!-- Button to trigger modal -->
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createKomunitasModal">
                        Create Komunitas
                    </button>
                </div>
                <div class="mt-4">
                    @if ($komunitas->isEmpty())
                    <p>No communities found.</p>
                    @else
                    @foreach ($komunitas as $detail)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $detail->Komunitas->name ?? 'Tidak ditemukan' }}</h5>
                            <p class="card-text">{{ $detail->role }}</p>
                            @if ($detail->Komunitas)
                            <a href="{{ route('DetailKomunitas', ['id' => $detail->Komunitas->id]) }}"
                                class="btn btn-info">
                                Detail
                            </a>
                            @else
                            <span class="text-muted">No community found</span>
                            @endif

                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>



        <!-- Column for Komunitas Tersedia (Available Communities) -->
        <div class="col-md-6">
            <div class="card p-4 shadow-sm">
                <h2 class="m-0">Komunitas Tersedia</h2>
                <div class="mt-4">
                    @foreach ($Tersedia as $available)
                    <div class="card mb-3">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h5 class="card-title">{{ $available->Komunitas->name }}</h5>
                            <form wire:submit.prevent="Bergabung({{ $available->id }})">
                                @csrf
                                <button type="submit" class="btn btn-success">
                                    Bergabung
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Form -->
    <div class="modal fade" id="createKomunitasModal" tabindex="-1" aria-labelledby="createKomunitasLabel"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createKomunitasLabel">Buat Komunitas Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="storeKomunitas">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Komunitas</label>
                            <input type="text" id="name" wire:model="name" class="form-control"
                                placeholder="Nama Komunitas">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi Komunitas</label>
                            <input type="text" id="description" wire:model="description" class="form-control"
                                placeholder="Deskripsi Komunitas">
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar / Logo Komunitas</label>
                            <input type="file" id="image" wire:model="image" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Buat
                                Komunitas</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (if not already included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</div>
