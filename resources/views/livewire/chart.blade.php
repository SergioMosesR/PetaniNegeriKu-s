<div>
    <div>
        <!-- Filter Wilayah -->
        <div class="form-group">
            <label for="region">Pilih Wilayah</label>
            <select wire:model="region" class="form-control" id="region">
                <option value="Jawa Tengah">Jawa Tengah</option>
                <option value="Jakarta">Jakarta</option>
                <option value="Yogyakarta">Yogyakarta</option>
                <!-- Tambahkan wilayah lainnya sesuai dengan data wilayah di user -->
            </select>
        </div>

        <!-- Menampilkan Chart -->
        <canvas id="myChart" width="400" height="200"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('livewire:load', function () {
            var ctx = document.getElementById('myChart').getContext('2d');

            var chartData = @json($data); // Data yang dikirim dari Livewire component

            var myChart = new Chart(ctx, {
                type: 'bar', // Jenis chart, bisa disesuaikan dengan jenis chart yang diinginkan
                data: chartData,
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                });
        });
    </script>
</div>
