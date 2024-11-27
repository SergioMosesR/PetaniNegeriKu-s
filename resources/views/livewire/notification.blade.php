<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card w-75">
        <div class="card-header bg-primary text-white text-center">
            <h4>Notifikasi Undangan</h4>
        </div>
        <div class="card-body">
            <table class="table table-borderless">
                <thead>
                    <tr class="text-center">
                        <th>Judul</th>
                        <th>Penyelenggara</th>
                        <th>Waktu</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($undangan as $item)
                        <tr style="cursor: pointer;" wire:click="showDetail({{ $item->undangan->id }})">
                            <td>{{ $item->undangan->title }}</td>
                            <td>{{ $item->undangan->penyelenggara }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->undangan->waktu)->format('d M Y, H:i') }}</td>
                            <td class="text-center">
                                @if ($item->is_read)
                                    <span class="badge bg-success">Sudah Dibaca</span>
                                @else
                                    <span class="badge bg-danger">Belum Dibaca</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada undangan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    @if ($showModal && $selectedUndangan)
        <div class="modal fade show d-block" tabindex="-1" style="background: rgba(0,0,0,0.5);">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Undangan</h5>
                        <button type="button" class="btn-close" wire:click="closeModal"></button>
                    </div>
                    <div class="modal-body">
                        <h5>{{ $selectedUndangan->title }}</h5>
                        <p><strong>Penyelenggara:</strong> {{ $selectedUndangan->penyelenggara }}</p>
                        <p><strong>Waktu:</strong> {{ \Carbon\Carbon::parse($selectedUndangan->waktu)->format('d M Y, H:i') }}</p>
                        <p><strong>Tempat:</strong> {{ $selectedUndangan->tempat }}</p>
                        <p>{{ $selectedUndangan->content }}</p>
                        @if ($selectedUndangan->image)
                            <img src="{{ asset('storage/' . $selectedUndangan->image) }}" class="img-fluid" alt="Undangan Image">
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
