<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Berita || Petani NegeriKu</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">{{ $BeritaDinas->title }}</h1>

        <!-- Display image if available -->
        @if ($BeritaDinas->image)
        <img src="{{ Storage::url($BeritaDinas->image) }}" alt="Gambar Berita" class="img-fluid mb-4">
        @endif

        <div class="card">
            <div class="card-body">
                <p>{{ $BeritaDinas->content }}</p>
                <p class="text-muted">Posted on: {{ $BeritaDinas->created_at->format('d F Y, H:i') }}</p>
            </div>
        </div>

        <a href="{{ route('BeritaPetani') }}" class="btn btn-primary mt-4">Kembali</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
