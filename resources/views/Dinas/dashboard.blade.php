<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Komoditas</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .card {
            margin: 1rem;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .row {
            justify-content: center;
        }

        canvas {
            margin-top: 20px;
        }

        .navbar-brand {
            font-weight: bold;
        }

        .nav-link {
            font-size: 1.1rem;
        }

        body {
            padding-top: 4.5rem;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Dinas Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('BeritaDinas') }}">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('UndanganDinas') }}">Undangan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="text-center my-4">Distribusi Komoditas</h1>
        <div class="row" id="chartsContainer"></div>
    </div>

    <script>
        // Simpan data dari Laravel ke variabel JavaScript
        const chartData = @json($chartData);

        // Container untuk semua chart
        const chartsContainer = document.getElementById('chartsContainer');

        // Loop setiap region dan buat chart per region
        Object.entries(chartData).forEach(([region, items]) => {
            // Buat elemen card
            const card = document.createElement('div');
            card.className = 'col-md-4 card';

            // Buat elemen untuk judul dan canvas
            const regionTitle = document.createElement('h5');
            regionTitle.textContent = `Komoditas Distribusi ${region}`;

            const canvas = document.createElement('canvas');
            canvas.id = `chart-${region}`;

            // Tambahkan elemen ke card
            card.appendChild(regionTitle);
            card.appendChild(canvas);

            // Tambahkan card ke container
            chartsContainer.appendChild(card);

            // Ambil data untuk labels dan values
            const labels = items.map(item => item.komoditas);
            const data = items.map(item => {
                const total = items.reduce((sum, i) => sum + i.percentage, 0);
                return ((item.percentage / total) * 100).toFixed(2);
            });

            // Konfigurasi chart
            const ctx = canvas.getContext('2d');
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        label: `Distribusi Komoditas di ${region}`,
                        data: data,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return `${tooltipItem.label}: ${tooltipItem.raw}%`;
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
