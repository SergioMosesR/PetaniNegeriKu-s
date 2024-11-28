<div class="container mt-5">
    <h1 class="mb-4 text-center">Komunitas || Petani NegeriKu</h1>

    <!-- Card Section -->
    <div class="card p-4 shadow-sm">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="m-0">Komunitas</h2>
            <!-- Button to trigger modal -->
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createKomunitasModal">
                Create Komunitas
            </button>
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
                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Buat Komunitas</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (if not already included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</div>