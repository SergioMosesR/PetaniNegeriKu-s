<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pending || Petani NegeriKu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Pending NegeriKu</h1>

        <!-- Alert Section -->
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @elseif(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <!-- Table Section -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Pembeli</th>
                    <th>Nama Post</th>
                    <th>Unit</th>
                    <th>Qty</th>
                    <th>Grandtotal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pending as $key => $pembelanjaan)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $pembelanjaan->user->name ?? 'Unknown' }}</td>
                    <td>{{ $pembelanjaan->post->title ?? 'Unknown' }}</td>
                    <td>{{ $pembelanjaan->unit }}</td>
                    <td>{{ $pembelanjaan->qty }}</td>
                    <td>Rp{{ number_format($pembelanjaan->grandtotal, 2, ',', '.') }}</td>
                    <td>
                        <form action="{{ route('ProccessPending', $pembelanjaan->id) }}" method="POST"
                            style="display:inline;"
                            onclick="return confirm('Are you sure you want to proccess this item?');">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success btn-sm">Process</button>
                        </form>

                        <form action="{{ route('DeletePending', ['id' => $pembelanjaan->id]) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this item?');">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">No data available.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
