@extends('layouts.app')

@section('title', 'Dashboard Kasir')

@section('page-title')
    <div class="page-title-head d-flex align-items-center">
        <div class="flex-grow-1">
            <h4 class="page-main-title m-0">
                Halo, {{ auth()->user()->nama }} 👋
            </h4>
            <p class="text-muted mb-0">
                Selamat bekerja • {{ now()->translatedFormat('l, d F Y') }}
            </p>
        </div>
        <div class="text-end">
            <ol class="breadcrumb m-0 py-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')

    {{-- ============================================================ --}}
    {{-- HERO BANNER                                                   --}}
    {{-- ============================================================ --}}
    <div class="dashboard-hero rounded-4 mb-4 p-4 position-relative overflow-hidden">
        <div class="hero-bg-shape"></div>
        <div class="hero-bg-shape2"></div>
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 position-relative">
            <div>
                <div class="d-flex align-items-center gap-2 mb-2">
                    <span class="live-dot"></span>
                    <small class="text-white-50 fw-medium">Sistem Aktif</small>
                </div>
                <h3 class="fw-bold text-white mb-1">
                    Selamat Datang, {{ auth()->user()->nama }} 👋
                </h3>
                <p class="text-white-50 mb-0">
                    Kelola transaksi penjualan dan pantau aktivitas hari ini.
                </p>
            </div>
            <div class="text-end">
                <div class="text-white-50 small mb-1">{{ now()->translatedFormat('l') }}</div>
                <div class="text-white fw-bold fs-5">{{ now()->translatedFormat('d F Y') }}</div>
            </div>
        </div>
    </div>

    {{-- ============================================================ --}}
    {{-- STAT CARDS                                                    --}}
    {{-- ============================================================ --}}
    <div class="row g-3 mb-4">

        <div class="col-md-4">
            <div class="stat-card card border-0 rounded-4 h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-start justify-content-between mb-3">
                        <div class="stat-icon bg-primary-subtle rounded-3 d-flex align-items-center justify-content-center"
                            style="width:48px;height:48px;">
                            <i class="ti ti-shopping-cart text-primary fs-22"></i>
                        </div>
                        <span class="badge bg-primary-subtle text-primary rounded-pill px-2 py-1 fs-xxs">Hari Ini</span>
                    </div>
                    <div class="stat-number fw-bold text-dark">{{ $totalTransaksi ?? 0 }}</div>
                    <div class="text-muted small mt-1">Transaksi Hari Ini</div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="stat-card card border-0 rounded-4 h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-start justify-content-between mb-3">
                        <div class="stat-icon bg-success-subtle rounded-3 d-flex align-items-center justify-content-center"
                            style="width:48px;height:48px;">
                            <i class="ti ti-package text-success fs-22"></i>
                        </div>
                        <span class="badge bg-success-subtle text-success rounded-pill px-2 py-1 fs-xxs">Produk</span>
                    </div>
                    <div class="stat-number fw-bold text-dark">{{ $totalBarang ?? 0 }}</div>
                    <div class="text-muted small mt-1">Total Produk</div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="stat-card card border-0 rounded-4 h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-start justify-content-between mb-3">
                        <div class="stat-icon bg-warning-subtle rounded-3 d-flex align-items-center justify-content-center"
                            style="width:48px;height:48px;">
                            <i class="ti ti-box text-warning fs-22"></i>
                        </div>
                        <span class="badge bg-warning-subtle text-warning rounded-pill px-2 py-1 fs-xxs">Stok</span>
                    </div>
                    <div class="stat-number fw-bold text-dark">{{ $totalBarangTersedia ?? 0 }}</div>
                    <div class="text-muted small mt-1">Barang Tersedia</div>
                </div>
            </div>
        </div>

    </div>

    {{-- ============================================================ --}}
    {{-- AKSES CEPAT                                                   --}}
    {{-- ============================================================ --}}
    <div class="card border-0 rounded-4 mb-4" style="background: var(--bs-light);">
        <div class="card-body p-4">
            <div class="d-flex align-items-center gap-2 mb-3">
                <i class="ti ti-bolt text-primary fs-18"></i>
                <h6 class="fw-bold mb-0">Akses Cepat</h6>
            </div>
            <div class="d-flex gap-2 flex-wrap">
                <a href="{{ route('kasir.transaksi') }}"
                    class="btn btn-primary rounded-pill px-4 fw-semibold d-flex align-items-center gap-2">
                    <i class="ti ti-shopping-cart"></i>
                    Mulai Transaksi
                </a>
                <a href="{{ route('kasir.barang') }}"
                    class="btn btn-outline-secondary rounded-pill px-4 fw-semibold d-flex align-items-center gap-2">
                    <i class="ti ti-package"></i>
                    Lihat Barang
                </a>
                <a href="{{ route('kasir.riwayat-transaksi') }}"
                    class="btn btn-outline-secondary rounded-pill px-4 fw-semibold d-flex align-items-center gap-2">
                    <i class="ti ti-history"></i>
                    Riwayat Transaksi
                </a>
            </div>
        </div>
    </div>

    {{-- ============================================================ --}}
    {{-- TABEL RIWAYAT TRANSAKSI HARI INI                             --}}
    {{-- ============================================================ --}}
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-header border-0 pt-4 px-4 pb-3">

            <div class="d-flex align-items-center w-100">

                {{-- Kiri --}}
                <div class="d-flex align-items-center gap-2 flex-grow-1">

                    <div class="bg-primary-subtle rounded-3 d-flex align-items-center justify-content-center"
                        style="width:40px;height:40px;">
                        <i class="ti ti-receipt text-primary fs-18"></i>
                    </div>

                    <div>
                        <h6 class="fw-bold mb-0">
                            10 Transaksi Terakhir
                        </h6>

                        <small class="text-muted">
                            Daftar transaksi milik Anda
                        </small>
                    </div>

                </div>

                {{-- Kanan --}}
                <div>
                    <a href="{{ route('kasir.riwayat-transaksi') }}"
                        class="btn btn-sm btn-outline-primary rounded-pill px-3 fw-semibold text-nowrap">
                        Lihat Semua
                    </a>
                </div>

            </div>

        </div>

        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4 text-muted fw-semibold fs-xxs text-uppercase py-3" style="width:130px;">No.
                            Transaksi</th>
                        <th class="text-muted fw-semibold fs-xxs text-uppercase py-3">Jam</th>
                        <th class="text-muted fw-semibold fs-xxs text-uppercase py-3">Total Belanja</th>
                        <th class="text-muted fw-semibold fs-xxs text-uppercase py-3">Uang Bayar</th>
                        <th class="text-muted fw-semibold fs-xxs text-uppercase py-3">Kembalian</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($dataPenjualan as $data)
                        <tr class="trx-row">
                            <td class="ps-4">
                                <span class="fw-bold text-primary">
                                    #TX{{ str_pad($loop->iteration, 3, '0', STR_PAD_LEFT) }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <i class="ti ti-clock text-muted fs-sm"></i>
                                    <span class="fw-semibold">
                                        {{ \Carbon\Carbon::parse($data->tanggal_penjualan)->format('H:i') }} WIB
                                    </span>
                                </div>
                            </td>
                            <td>
                                <span class="fw-bold text-dark">
                                    Rp {{ number_format($data->total_harga, 0, ',', '.') }}
                                </span>
                            </td>
                            <td>
                                <span class="fw-semibold text-success">
                                    Rp {{ number_format($data->uang_bayar, 0, ',', '.') }}
                                </span>
                            </td>
                            <td>
                                <span class="fw-semibold text-info">
                                    Rp {{ number_format($data->kembalian, 0, ',', '.') }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <div class="d-flex flex-column align-items-center gap-2">
                                    <div class="bg-light rounded-circle d-flex align-items-center justify-content-center"
                                        style="width:72px;height:72px;">
                                        <i class="ti ti-receipt-off text-muted fs-32"></i>
                                    </div>
                                    <h6 class="fw-semibold mb-1 mt-2">Belum Ada Transaksi</h6>
                                    <p class="text-muted mb-3 small">Transaksi hari ini akan muncul di sini</p>
                                    <a href="{{ route('kasir.transaksi.index') }}"
                                        class="btn btn-primary btn-sm rounded-pill px-4">
                                        <i class="ti ti-plus me-1"></i> Buat Transaksi Baru
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer border-0 py-3 px-4">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                <small class="text-muted">
                    Total hari ini:
                    <span class="fw-bold text-dark">{{ $dataPenjualan->count() }} transaksi</span>
                </small>
                <div data-table-pagination></div>
            </div>
        </div>

    </div>

@endsection

@push('scripts')
    <script src="assets/js/pages/dashboard-finance.js"></script>
@endpush

@push('styles')
    <style>
        /* ── Hero Banner ───────────────────────────────────────────── */
        .dashboard-hero {
            background: linear-gradient(135deg, #3b7ddd 0%, #1a4fa0 100%);
            min-height: 110px;
        }

        .hero-bg-shape {
            position: absolute;
            top: -30px;
            right: -30px;
            width: 160px;
            height: 160px;
            background: rgba(255, 255, 255, .06);
            border-radius: 50%;
        }

        .hero-bg-shape2 {
            position: absolute;
            bottom: -50px;
            right: 80px;
            width: 220px;
            height: 220px;
            background: rgba(255, 255, 255, .04);
            border-radius: 50%;
        }

        /* ── Live dot ──────────────────────────────────────────────── */
        .live-dot {
            display: inline-block;
            width: 8px;
            height: 8px;
            background: #4ade80;
            border-radius: 50%;
            box-shadow: 0 0 0 2px rgba(74, 222, 128, .3);
            animation: pulse-dot 1.8s infinite;
        }

        @keyframes pulse-dot {

            0%,
            100% {
                box-shadow: 0 0 0 2px rgba(74, 222, 128, .3);
            }

            50% {
                box-shadow: 0 0 0 5px rgba(74, 222, 128, .1);
            }
        }

        /* ── Stat Cards ────────────────────────────────────────────── */
        .stat-card {
            transition: transform .2s ease, box-shadow .2s ease;
            box-shadow: 0 1px 4px rgba(0, 0, 0, .06);
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, .09) !important;
        }

        .stat-number {
            font-size: 2rem;
            line-height: 1;
        }

        /* ── Table rows ────────────────────────────────────────────── */
        .trx-row {
            transition: background .15s;
        }

        .trx-row:hover {
            background: rgba(59, 125, 221, .04);
        }

        .trx-row td {
            border-color: rgba(0, 0, 0, .04);
            padding-top: 14px;
            padding-bottom: 14px;
        }
    </style>
@endpush
