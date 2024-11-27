<div class="container">
    <!-- Menampilkan wilayah yang terdaftar berdasarkan pencarian -->
    <div class="row">
        @foreach($charts as $chart)
        <div class="col-md-4 mb-4">
            <!-- Card untuk setiap wilayah -->
            <div class="card">
                <div class="card-header">
                    <h3>{{ $chart->getTitle() }}</h3>
                    <!-- Menampilkan pie chart untuk wilayah -->
                    {!! $chart->render() !!}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
