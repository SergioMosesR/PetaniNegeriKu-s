<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Berita Dinas || Petani NegeriKu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Berita Dinas</h1>

        @foreach ($BeritaDinas as $berita)
        <div class="card mb-4">
            @if ($berita->image)
            <img src="{{ Storage::url($berita->image) }}" alt="Gambar Berita" class="card-img-top">
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ $berita->title }}</h5>
                <p class="card-text">{{ Str::limit($berita->content, 150) }} <a
                        href="{{route('DetailBerita', ['id' => $berita->id ])}}">Selengkapnya...</a></p>
                <p class="text-muted">{{ $berita->created_at->format('d F Y, H:i') }}</p>
                <a href="{{route('DetailBerita', ['id' => $berita->id ])}}" class="btn btn-primary">Baca
                    Selengkapnya</a>
            </div>
        </div>
        @endforeach

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {{ $BeritaDinas->links() }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
