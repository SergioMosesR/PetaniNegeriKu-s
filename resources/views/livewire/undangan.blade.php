<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Undangan || Petani NegeriKu</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container mt-5">
        <!-- Alert Section -->
        <div class="alert-section mb-4">
            @if (session()->has('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session()->has('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
        </div>

        <!-- Form Undangan -->
        <div class="card mb-4">
            <div class="card-header">
                <h4>{{ $isEdit ? 'Edit Undangan' : 'Buat Undangan' }}</h4>
            </div>
            <div class="card-body">
                <form wire:submit.prevent={{$isEdit ? 'update' : 'store' }}>
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Undangan</label>
                        <input type="text" name="title" wire:model='title' class="form-control" id="title">
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Konten Undangan</label>
                        <textarea name="content" wire:model='content' class="form-control" id="content" cols="30"
                            rows="5"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="penyelenggara" class="form-label">Penyelenggara</label>
                        <input type="text" name="penyelenggara" wire:model='penyelenggara' class="form-control"
                            id="penyelenggara">
                    </div>

                    <div class="mb-3">
                        <label for="waktu" class="form-label">Waktu Undangan</label>
                        <input type="datetime-local" name="waktu" wire:model='waktu' class="form-control" id="waktu">
                    </div>

                    <div class="mb-3">
                        <label for="tempat" class="form-label">Tempat</label>
                        <input type="text" name="tempat" wire:model='tempat' class="form-control" id="tempat">
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Upload Gambar</label>
                        <input type="file" name="image" wire:model='image' class="form-control" id="image">
                    </div>

                    <button type="submit" class="btn btn-primary">{{ $isEdit ? 'Perbarui Undangan' : 'Buat Undangan'
                        }}</button>
                    <button type="button" wire:click="resetForm" class="btn btn-secondary">Reset Form</button>
                </form>
            </div>
        </div>

        <!-- Table Undangan -->
        <div class="card">
            <div class="card-header">
                <h4>Daftar Undangan</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th>Penyelenggara</th>
                            <th>Waktu</th>
                            <th>Tempat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($undangans as $key => $undangan)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $undangan->title }}</td>
                            <td>{{ $undangan->penyelenggara }}</td>
                            <td>{{ \Carbon\Carbon::parse($undangan->waktu)->format('d M Y H:i') }}</td>
                            <td>{{ $undangan->tempat }}</td>
                            <td>
                                <button wire:click="edit({{ $undangan->id }})"
                                    class="btn btn-warning btn-sm">Edit</button>
                                <button wire:click="delete({{ $undangan->id }})"
                                    class="btn btn-danger btn-sm">Hapus</button>
                                <a href="{{ route('DetailUndangan', ['id' => $undangan->id]) }}"
                                    class="btn btn-info btn-sm">Lihat</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada undangan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
