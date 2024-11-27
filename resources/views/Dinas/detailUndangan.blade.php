<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Undangan || Petani NegeriKu</title>

    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Detail Undangan</h1>

        <!-- Card for Undangan Details -->
        <div class="card">
            <div class="card-header">
                <h4>{{ $undangan->title }}</h4>
            </div>
            <div class="card-body">
                <h5 class="card-title">Penyelenggara: {{ $undangan->penyelenggara }}</h5>
                <p class="card-text">
                    <strong>Waktu:</strong> {{ $undangan->waktu }} <br>
                    <strong>Tempat:</strong> {{ $undangan->tempat }} <br>
                </p>
                <div>
                    <strong>Konten Undangan:</strong>
                    <p>{{ $undangan->content }}</p>
                </div>
                @if ($undangan->image)
                <div>
                    <strong>Gambar:</strong>
                    <img src="{{ asset('storage/' . $undangan->image) }}" class="img-fluid" alt="Undangan Image">
                </div>
                @endif
            </div>
            <div class="card-footer text-muted">
                Dibuat pada: {{ $undangan->created_at }}
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
