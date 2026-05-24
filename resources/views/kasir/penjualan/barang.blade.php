@extends('layouts.app')

@section('title', 'Data Barang')

@section('page-title')
    <div class="page-title-head d-flex align-items-center">
        <div class="flex-grow-1">
            <h4 class="page-main-title m-0">Transaksi Penjualan</h4>
        </div>
        <div class="text-end">
            <ol class="breadcrumb m-0 py-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                <li class="breadcrumb-item active">Transaksi</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')

    {{-- ======================================================= --}}
    {{-- TABEL DAFTAR BARANG                                      --}}
    {{-- ======================================================= --}}
    <div class="row">
        <div class="col-12">
            <div data-table data-table-rows-per-page="8" class="card">
                <div class="card-header border-light justify-content-between">
                    <h4 class="card-title">
                        Daftar Barang
                        <span class="text-muted fw-normal fs-14">({{ $totalBarang ?? 0 }} Barang)</span>
                    </h4>
                    <div class="d-flex align-items-center gap-2">
                        <div>
                            <select data-table-set-rows-per-page class="form-select form-control my-1 my-md-0">
                                <option value="5">5</option>
                                <option value="10" selected>10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                            </select>
                        </div>
                        <div class="app-search">
                            <input data-table-search type="search" class="form-control" placeholder="Cari Barang..." />
                            <i class="ti ti-search app-search-icon text-muted"></i>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-custom table-nowrap table-centered table-select table-hover w-100 mb-0">
                        <thead class="bg-light align-middle bg-opacity-25 thead-sm">
                            <tr class="text-uppercase fs-xxs">
                                <th data-table-sort class="text-muted">KODE</th>
                                <th data-table-sort class="text-muted">Nama Barang</th>
                                <th class="text-muted">Harga</th>
                                <th data-table-sort class="text-muted">Stok</th>
                                <th data-table-sort class="text-muted">Satuan</th>
                                <th class="text-muted">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataBarang as $data)
                                <tr>
                                    <td><a href="#!" class="fw-medium text-reset">{{ $data->kode_barang }}</a></td>
                                    <td>{{ $data->nama_barang }}</td>
                                    <td>
                                        <span class="fw-bold text-success">
                                            Rp {{ number_format($data->harga_jual, 0, ',', '.') }}
                                        </span>
                                    </td>
                                    <td>
                                        @if ($data->stok > 10)
                                            <span class="badge bg-success-subtle text-success rounded-pill px-3 py-2">
                                                {{ $data->stok }} tersedia
                                            </span>
                                        @elseif($data->stok > 0)
                                            <span class="badge bg-warning-subtle text-warning rounded-pill px-3 py-2">
                                                {{ $data->stok }} tersisa
                                            </span>
                                        @else
                                            <span class="badge bg-danger-subtle text-danger rounded-pill px-3 py-2">
                                                Habis
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $data->satuan ?? 'Tidak ada' }}
                                    </td>
                                    <td class="pe-4">
                                        <button class="btn btn-default btn-icon btn-sm btn-detail-barang"
                                            data-id="{{ $data->id }}" title="Lihat Detail">
                                            <i class="ti ti-eye fs-lg"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="card-footer border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div data-table-pagination-info="Barang "></div>
                        <div data-table-pagination></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ======================================================= --}}
    {{-- MODAL DETAIL BARANG                                      --}}
    {{-- ======================================================= --}}
    <div class="modal fade" id="modalDetailBarang" tabindex="-1" aria-labelledby="modalDetailBarangLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 480px;">
            <div class="modal-content rounded-4 border-0 shadow">

                {{-- Header --}}
                <div class="modal-header border-0 pb-0 px-4 pt-4">
                    <div class="d-flex align-items-center gap-2">
                        <div class="bg-primary-subtle rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 42px; height: 42px;">
                            <i class="ti ti-package text-primary fs-20"></i>
                        </div>
                        <div>
                            <h5 class="modal-title fw-bold mb-0" id="modalDetailBarangLabel">Detail Barang</h5>
                            <small class="text-muted" id="modal-kode-barang">—</small>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                {{-- Body --}}
                <div class="modal-body px-4 pt-3 pb-0">

                    {{-- Loading --}}
                    <div id="modal-barang-loading" class="text-center py-5">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="text-muted mt-2 mb-0">Memuat data...</p>
                    </div>

                    {{-- Konten --}}
                    <div id="modal-barang-content" style="display: none;">

                        {{-- Nama Barang --}}
                        <div class="text-center mb-4">
                            <div class="bg-primary-subtle rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3"
                                style="width: 64px; height: 64px;">
                                <i class="ti ti-box text-primary fs-28"></i>
                            </div>
                            <h5 class="fw-bold mb-0" id="modal-nama-barang">—</h5>
                            <span id="modal-stok-badge" class="badge rounded-pill mt-1">—</span>
                        </div>

                        {{-- Info Grid --}}
                        <div class="row g-2 mb-4">

                            <div class="col-6">
                                <div class="bg-light rounded-3 p-3 h-100">
                                    <small class="text-muted d-block mb-1">
                                        <i class="ti ti-tag me-1"></i>Kode Barang
                                    </small>
                                    <span class="fw-semibold" id="modal-kode">—</span>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="bg-light rounded-3 p-3 h-100">
                                    <small class="text-muted d-block mb-1">
                                        <i class="ti ti-ruler me-1"></i>Satuan
                                    </small>
                                    <span class="fw-semibold" id="modal-satuan">—</span>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="bg-light rounded-3 p-3 h-100">
                                    <small class="text-muted d-block mb-1">
                                        <i class="ti ti-category me-1"></i>Kategori
                                    </small>
                                    <span class="fw-semibold" id="modal-kategori">—</span>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="bg-light rounded-3 p-3 h-100">
                                    <small class="text-muted d-block mb-1">
                                        <i class="ti ti-building-store me-1"></i>Supplier
                                    </small>
                                    <span class="fw-semibold" id="modal-supplier">—</span>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="bg-success-subtle rounded-3 p-3 h-100">
                                    <small class="text-muted d-block mb-1">
                                        <i class="ti ti-cash me-1"></i>Harga Jual
                                    </small>
                                    <span class="fw-bold text-success" id="modal-harga-jual">—</span>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="bg-light rounded-3 p-3 h-100">
                                    <small class="text-muted d-block mb-1">
                                        <i class="ti ti-packages me-1"></i>Stok
                                    </small>
                                    <span class="fw-bold" id="modal-stok">—</span>
                                </div>
                            </div>

                        </div>

                    </div>

                    {{-- Error --}}
                    <div id="modal-barang-error" style="display: none;" class="text-center py-4">
                        <i class="ti ti-alert-circle text-danger fs-40 d-block mb-2"></i>
                        <p class="text-muted mb-0" id="modal-barang-error-msg">Gagal memuat data.</p>
                    </div>

                </div>

                {{-- Footer --}}
                <div class="modal-footer border-0 px-4 pb-4 pt-2">
                    <button type="button" class="btn btn-light rounded-3 w-100" data-bs-dismiss="modal">
                        <i class="ti ti-x me-1"></i> Tutup
                    </button>
                </div>

            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(function() {

            const URL_DETAIL = "{{ route('kasir.barang.detail', ['id' => '__ID__']) }}";

            // ─── Klik tombol detail ───────────────────────────────────────────────
            $(document).on('click', '.btn-detail-barang', function() {
                const id = $(this).data('id');
                const url = URL_DETAIL.replace('__ID__', id);

                // Reset ke state loading
                $('#modal-barang-loading').show();
                $('#modal-barang-content').hide();
                $('#modal-barang-error').hide();
                $('#modal-kode-barang').text('—');

                // Buka modal
                const modal = new bootstrap.Modal(document.getElementById('modalDetailBarang'));
                modal.show();

                // Ambil data via AJAX
                $.get(url)
                    .done(function(res) {
                        if (!res.success) {
                            showError(res.message || 'Gagal memuat data.');
                            return;
                        }
                        renderModal(res.data);
                    })
                    .fail(function(xhr) {
                        showError(xhr.responseJSON?.message || 'Terjadi kesalahan.');
                    });
            });

            // ─── Render data ke modal ─────────────────────────────────────────────
            function renderModal(data) {
                // Header
                $('#modal-kode-barang').text(data.kode_barang);

                // Nama & badge stok
                $('#modal-nama-barang').text(data.nama_barang);

                const badgeMap = {
                    aman: {
                        cls: 'bg-success-subtle text-success',
                        label: 'Stok Aman'
                    },
                    menipis: {
                        cls: 'bg-warning-subtle text-warning',
                        label: 'Stok Menipis'
                    },
                    habis: {
                        cls: 'bg-danger-subtle text-danger',
                        label: 'Stok Habis'
                    },
                };
                const badge = badgeMap[data.stok_status] || badgeMap.aman;
                $('#modal-stok-badge')
                    .removeClass(
                        'bg-success-subtle text-success bg-warning-subtle text-warning bg-danger-subtle text-danger'
                    )
                    .addClass(badge.cls)
                    .text(badge.label);

                // Info
                $('#modal-kode').text(data.kode_barang);
                $('#modal-satuan').text(data.satuan);
                $('#modal-kategori').text(data.kategori);
                $('#modal-supplier').text(data.supplier);
                $('#modal-harga-jual').text(data.harga_jual);
                $('#modal-stok').text(data.stok + ' ' + data.satuan);

                // Tampilkan konten
                $('#modal-barang-loading').hide();
                $('#modal-barang-content').show();
            }

            // ─── Tampilkan error ──────────────────────────────────────────────────
            function showError(msg) {
                $('#modal-barang-loading').hide();
                $('#modal-barang-error-msg').text(msg);
                $('#modal-barang-error').show();
            }

        });
    </script>
@endpush
