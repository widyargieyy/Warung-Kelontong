@extends('layouts.app')

@section('title', 'Riwayat Transaksi')

@section('page-title')
    <div class="page-title-head d-flex align-items-center">
        <div class="flex-grow-1">
            <h4 class="page-main-title m-0">Riwayat Transaksi</h4>
        </div>
        <div class="text-end">
            <ol class="breadcrumb m-0 py-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                <li class="breadcrumb-item active">Riwayat Transaksi</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')

    {{-- ======================================================= --}}
    {{-- TABEL RIWAYAT TRANSAKSI                                  --}}
    {{-- ======================================================= --}}
    <div class="row">
        <div class="col-12">
            <div data-table data-table-rows-per-page="10" class="card">
                <div class="card-header border-light justify-content-between">
                    <h4 class="card-title">
                        Daftar Transaksi
                        <span class="text-muted fw-normal fs-14">({{ $dataPenjualan->total() }} Transaksi)</span>
                    </h4>
                    <div class="d-flex align-items-center gap-2">
                        <div class="app-search">
                            <input data-table-search type="search" class="form-control" placeholder="Cari Transaksi..." />
                            <i class="ti ti-search app-search-icon text-muted"></i>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-custom table-nowrap table-centered table-hover w-100 mb-0">
                        <thead class="bg-light align-middle bg-opacity-25 thead-sm">
                            <tr class="text-uppercase fs-xxs">
                                <th class="text-muted">ID Transaksi</th>
                                <th class="text-muted">Tanggal</th>
                                <th class="text-muted">Total</th>
                                <th class="text-muted">Bayar</th>
                                <th class="text-muted">Kembalian</th>
                                <th class="text-muted">Kasir</th>
                                <th class="text-muted">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($dataPenjualan as $data)
                                <tr>
                                    <td>
                                        <span class="fw-medium badge bg-primary-subtle text-primary rounded-pill px-3 py-2">
                                            {{ 'TRX-' . str_pad($data->id, 4, '0', STR_PAD_LEFT) }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="fw-semibold">{{ $data->tanggal_penjualan->format('d M Y') }}</div>
                                        <small class="text-muted">{{ $data->tanggal_penjualan->format('H:i') }} WIB</small>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-success">
                                            Rp {{ number_format($data->total_harga, 0, ',', '.') }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-info">
                                            Rp {{ number_format($data->uang_bayar, 0, ',', '.') }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-warning">
                                            Rp {{ number_format($data->kembalian, 0, ',', '.') }}
                                        </span>
                                    </td>
                                    <td>{{ $data->user->nama ?? '-' }}</td>
                                    <td class="pe-4">
                                        {{-- Tombol detail → kirim id transaksi --}}
                                        <button class="btn btn-default btn-icon btn-sm btn-detail"
                                            data-id="{{ $data->id }}" title="Lihat Detail">
                                            <i class="ti ti-eye fs-lg"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-4">
                                        <i class="ti ti-receipt-off fs-32 d-block mb-2 opacity-50"></i>
                                        Belum ada transaksi
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="card-footer border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">
                            Menampilkan {{ $dataPenjualan->firstItem() }}–{{ $dataPenjualan->lastItem() }}
                            dari {{ $dataPenjualan->total() }} transaksi
                        </small>
                        {{ $dataPenjualan->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ======================================================= --}}
    {{-- MODAL DETAIL TRANSAKSI                                   --}}
    {{-- ======================================================= --}}
    <div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="modalDetailLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded-4 border-0 shadow">

                {{-- Header Modal --}}
                <div class="modal-header border-0 pb-0 px-4 pt-4">
                    <div class="d-flex align-items-center gap-2">
                        <div class="bg-primary-subtle rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 42px; height: 42px;">
                            <i class="ti ti-receipt text-primary fs-20"></i>
                        </div>
                        <div>
                            <h5 class="modal-title fw-bold mb-0" id="modalDetailLabel">Detail Transaksi</h5>
                            <small class="text-muted" id="modal-kode-transaksi">—</small>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                {{-- Body Modal --}}
                <div class="modal-body px-4 pt-3 pb-0">

                    {{-- Loading state --}}
                    <div id="modal-loading" class="text-center py-5">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="text-muted mt-2 mb-0">Memuat data...</p>
                    </div>

                    {{-- Konten detail (disembunyikan saat loading) --}}
                    <div id="modal-content" style="display: none;">

                        {{-- Info Transaksi --}}
                        <div class="row g-3 mb-4">
                            <div class="col-6">
                                <div class="bg-light rounded-3 p-3">
                                    <small class="text-muted d-block">Tanggal</small>
                                    <span class="fw-semibold" id="modal-tanggal">—</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="bg-light rounded-3 p-3">
                                    <small class="text-muted d-block">Jam</small>
                                    <span class="fw-semibold" id="modal-jam">—</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="bg-light rounded-3 p-3">
                                    <small class="text-muted d-block">Kasir</small>
                                    <span class="fw-semibold" id="modal-kasir">—</span>
                                </div>
                            </div>
                        </div>

                        {{-- Tabel Item --}}
                        <div class="table-responsive mb-4">
                            <table class="table table-sm table-bordered align-middle mb-0">
                                <thead class="bg-light thead-sm">
                                    <tr class="text-uppercase fs-xxs text-muted">
                                        <th>Barang</th>
                                        <th class="text-center">Qty</th>
                                        <th class="text-end">Harga</th>
                                        <th class="text-end">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody id="modal-items">
                                    {{-- Diisi jQuery --}}
                                </tbody>
                            </table>
                        </div>

                        {{-- Ringkasan Pembayaran --}}
                        <div class="bg-light rounded-4 p-3 mb-3">
                            <div class="d-flex justify-content-between py-1">
                                <span class="text-muted">Total Belanja</span>
                                <span class="fw-bold text-success" id="modal-total">—</span>
                            </div>
                            <div class="d-flex justify-content-between py-1">
                                <span class="text-muted">Uang Bayar</span>
                                <span class="fw-semibold text-info" id="modal-bayar">—</span>
                            </div>
                            <hr class="my-2">
                            <div class="d-flex justify-content-between py-1">
                                <span class="fw-semibold">Kembalian</span>
                                <span class="fw-bold text-warning fs-5" id="modal-kembalian">—</span>
                            </div>
                        </div>

                    </div>

                    {{-- Error state --}}
                    <div id="modal-error" style="display: none;" class="text-center py-4">
                        <i class="ti ti-alert-circle text-danger fs-40 d-block mb-2"></i>
                        <p class="text-muted mb-0" id="modal-error-msg">Gagal memuat data.</p>
                    </div>

                </div>

                {{-- Footer Modal --}}
                <div class="modal-footer border-0 px-4 pb-4 pt-2 gap-2" id="modal-footer"
                    style="display: none !important;">
                    <button type="button" class="btn btn-light rounded-3" data-bs-dismiss="modal">
                        <i class="ti ti-arrow-left me-1"></i> Kembali
                    </button>
                    <button type="button" class="btn btn-primary rounded-3" id="btn-cetak">
                        <i class="ti ti-printer me-1"></i> Cetak Struk
                    </button>
                </div>

            </div>
        </div>
    </div>

    {{-- ======================================================= --}}
    {{-- AREA CETAK STRUK (hidden, hanya muncul saat print)       --}}
    {{-- ======================================================= --}}
    <div id="struk-print" style="display: none;">
        <style>
            @media print {
                body * {
                    visibility: hidden;
                }

                #struk-print,
                #struk-print * {
                    visibility: visible;
                }

                #struk-print {
                    display: block !important;
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    font-family: monospace;
                    font-size: 12px;
                    padding: 10px;
                }
            }
        </style>
        <div style="text-align: center; border-bottom: 1px dashed #000; padding-bottom: 8px; margin-bottom: 8px;">
            <strong style="font-size: 14px;">TOKO KELONTONG</strong><br>
            <small>Struk Pembelian</small>
        </div>
        <div style="margin-bottom: 8px;">
            <div>No : <span id="struk-kode"></span></div>
            <div>Tgl: <span id="struk-tanggal"></span> <span id="struk-jam"></span></div>
            <div>Kasir: <span id="struk-kasir"></span></div>
        </div>
        <div style="border-top: 1px dashed #000; border-bottom: 1px dashed #000; padding: 6px 0; margin-bottom: 8px;">
            <table width="100%" id="struk-items-table">
                {{-- Diisi jQuery --}}
            </table>
        </div>
        <div>
            <div style="display: flex; justify-content: space-between;">
                <span>Total</span><span id="struk-total"></span>
            </div>
            <div style="display: flex; justify-content: space-between;">
                <span>Bayar</span><span id="struk-bayar"></span>
            </div>
            <div style="display: flex; justify-content: space-between; font-weight: bold;">
                <span>Kembali</span><span id="struk-kembalian"></span>
            </div>
        </div>
        <div style="text-align: center; margin-top: 10px; border-top: 1px dashed #000; padding-top: 8px;">
            <small>Terima kasih atas kunjungan Anda!</small>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(function() {

            const URL_DETAIL = "{{ route('kasir.riwayat-transaksi.detail', ['id' => '__ID__']) }}";

            // ─── Buka modal & ambil data detail ──────────────────────────────────
            $(document).on('click', '.btn-detail', function() {
                const id = $(this).data('id');
                const url = URL_DETAIL.replace('__ID__', id);

                // Reset modal ke state loading
                $('#modal-loading').show();
                $('#modal-content').hide();
                $('#modal-error').hide();
                $('#modal-footer').css('display', 'none !important');

                // Tampilkan modal
                const modal = new bootstrap.Modal(document.getElementById('modalDetail'));
                modal.show();

                // Ambil data via AJAX
                $.get(url)
                    .done(function(res) {
                        if (!res.success) {
                            showModalError(res.message || 'Gagal memuat data.');
                            return;
                        }
                        renderModal(res.data);
                    })
                    .fail(function(xhr) {
                        showModalError(xhr.responseJSON?.message || 'Terjadi kesalahan.');
                    });
            });

            // ─── Render data ke dalam modal ───────────────────────────────────────
            function renderModal(data) {
                // Header
                $('#modal-kode-transaksi').text(data.kode);

                // Info
                $('#modal-tanggal').text(data.tanggal);
                $('#modal-jam').text(data.jam);
                $('#modal-kasir').text(data.kasir);

                // Ringkasan
                $('#modal-total').text(data.total_harga);
                $('#modal-bayar').text(data.uang_bayar);
                $('#modal-kembalian').text(data.kembalian);

                // Isi tabel item
                const $tbody = $('#modal-items').empty();
                $.each(data.items, function(i, item) {
                    $tbody.append(`
                <tr>
                    <td>${item.nama_barang}</td>
                    <td class="text-center">${item.jumlah}</td>
                    <td class="text-end">${item.harga}</td>
                    <td class="text-end fw-semibold">${item.subtotal}</td>
                </tr>
            `);
                });

                // Isi data struk cetak
                $('#struk-kode').text(data.kode);
                $('#struk-tanggal').text(data.tanggal);
                $('#struk-jam').text(data.jam);
                $('#struk-kasir').text(data.kasir);
                $('#struk-total').text(data.total_harga);
                $('#struk-bayar').text(data.uang_bayar);
                $('#struk-kembalian').text(data.kembalian);

                const $struktable = $('#struk-items-table').empty();
                $.each(data.items, function(i, item) {
                    $struktable.append(`
                <tr>
                    <td colspan="2">${item.nama_barang}</td>
                </tr>
                <tr>
                    <td style="padding-left:8px;">${item.jumlah} x ${item.harga}</td>
                    <td style="text-align:right;">${item.subtotal}</td>
                </tr>
            `);
                });

                // Tampilkan konten, sembunyikan loading
                $('#modal-loading').hide();
                $('#modal-content').show();
                $('#modal-footer').css('display', 'flex').show();
            }

            // ─── Tampilkan error di dalam modal ──────────────────────────────────
            function showModalError(msg) {
                $('#modal-loading').hide();
                $('#modal-error-msg').text(msg);
                $('#modal-error').show();
            }

            // ─── Cetak struk ─────────────────────────────────────────────────────
            $('#btn-cetak').on('click', function() {
                window.print();
            });

        });
    </script>
@endpush
