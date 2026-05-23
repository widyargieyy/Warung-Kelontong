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
        {{-- Alert --}}
        <div class="card border-0 bg-primary text-white rounded-4 mb-4">
            <div class="card-body p-4">
                <h4 class="fw-bold">
                    Selamat Datang, {{ auth()->user()->name }}
                </h4>

                <p class="mb-0 text-white-50">
                    Kelola transaksi penjualan dan pantau aktivitas hari ini.
                </p>
            </div>
        </div>

        {{-- Row 4: Targets & Goals --}}
        {{-- <div class="d-flex align-items-center mb-3 mt-2">
            <h4 class="fw-bold fs-md">My Targets &amp; Goals</h4>
            <a href="#!" class="text-decoration-underline fw-semibold fs-15 ms-auto link-offset-2 link-dark">See All</a>
        </div> --}}

        <div class="row g-3 mb-4">

            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body d-flex align-items-center">

                        <div class="avatar-lg bg-primary-subtle rounded-3 me-3">
                            <i class="ti ti-shopping-cart text-primary fs-28"></i>
                        </div>

                        <div>
                            <p class="text-muted mb-1">
                                Transaksi Hari Ini
                            </p>

                            <h3 class="fw-bold mb-0">
                                {{ $totalTransaksi ?? 0 }}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body d-flex align-items-center">

                        <div class="avatar-lg bg-success-subtle rounded-3 me-3">
                            <i class="ti ti-package text-success fs-28"></i>
                        </div>

                        <div>
                            <p class="text-muted mb-1">
                                Total Produk
                            </p>

                            <h3 class="fw-bold mb-0">
                                {{ $totalBarang ?? 0 }}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body d-flex align-items-center">

                        <div class="avatar-lg bg-warning-subtle rounded-3 me-3">
                            <i class="ti ti-box text-warning fs-28"></i>
                        </div>

                        <div>
                            <p class="text-muted mb-1">
                                Barang Tersedia
                            </p>

                            <h3 class="fw-bold mb-0">
                                {{ $totalBarangTersedia ?? 0 }}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- end row-->

        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-body">
                <h5 class="fw-bold mb-3">
                    Akses Cepat
                </h5>

                <div class="d-flex gap-2 flex-wrap">

                    <a href="" class="btn btn-primary rounded-pill px-4">
                        <i class="ti ti-shopping-cart me-1"></i>
                        Mulai Transaksi
                    </a>

                    <a href="" class="btn btn-outline-primary rounded-pill px-4">
                        <i class="ti ti-package me-1"></i>
                        Lihat Barang
                    </a>

                </div>
            </div>
        </div>

        {{-- Row 3: Recent Transactions Table --}}
        {{-- Riwayat Transaksi --}}
        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-header border-0 pt-4 px-4">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">

                    <div>
                        <h5 class="fw-bold mb-1">
                            Riwayat Transaksi Hari Ini
                        </h5>

                        <p class="text-muted mb-0">
                            Daftar transaksi milik Anda hari ini
                        </p>
                    </div>

                    <div class="d-flex gap-2">

                        <div class="position-relative">
                            <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>

                            <input type="text" class="form-control ps-5 rounded-pill" placeholder="Cari transaksi..."
                                data-table-search>
                        </div>

                        <a href="#" class="btn btn-light rounded-pill px-3">
                            Lihat Semua
                        </a>

                    </div>

                </div>
            </div>

            <div class="table-responsive">
                <table class="table align-middle mb-0">

                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4">No</th>
                            <th>Jam</th>
                            <th>Total</th>
                            <th>Bayar</th>
                            <th>Kembalian</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($dataPenjualan as $data)
                            <tr>

                                <td class="ps-4">
                                    <span class="badge bg-light text-dark fw-semibold px-3 py-2">
                                        #TX{{ str_pad($loop->iteration, 3, '0', STR_PAD_LEFT) }}
                                    </span>
                                </td>

                                <td>
                                    <div class="fw-semibold">
                                        {{ \Carbon\Carbon::parse($data->tanggal_penjualan)->format('H:i') }}
                                    </div>
                                </td>

                                <td>
                                    <span class="fw-semibold">
                                        Rp {{ number_format($data->total_harga, 0, ',', '.') }}
                                    </span>
                                </td>

                                <td class="text-success fw-semibold">
                                    Rp {{ number_format($data->uang_bayar, 0, ',', '.') }}
                                </td>

                                <td class="text-primary fw-semibold">
                                    Rp {{ number_format($data->kembalian, 0, ',', '.') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">

                                    <div class="d-flex flex-column align-items-center">

                                        <i class="ti ti-receipt-off text-muted" style="font-size: 55px"></i>

                                        <h6 class="fw-semibold mt-3 mb-1">
                                            Belum Ada Transaksi
                                        </h6>

                                        <p class="text-muted mb-0">
                                            Transaksi hari ini akan muncul di sini
                                        </p>

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
                        Total transaksi:
                        <span class="fw-bold">
                            {{ $dataPenjualan->count() }}
                        </span>
                    </small>

                    <div data-table-pagination></div>

                </div>
            </div>

        </div>
        <!-- end row -->



    @endsection

    @push('scripts')
        <script src="assets/js/pages/dashboard-finance.js"></script>
    @endpush
