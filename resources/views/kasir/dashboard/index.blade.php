    @extends('layouts.app')

    @section('title', ' Dashboard')

    @section('page-title')
        <div class="page-title-head d-flex align-items-center">
            <div class="flex-grow-1">
                <h4 class="page-main-title m-0">Dashboard Admin</h4>
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
        <div class="alert alert-success alert-dismissible d-flex align-items-center" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <i class="ti ti-lifebuoy fs-24 me-1"></i>
            <div>
                <strong> Dear David Dev - </strong>
                We kindly encourage you to review your recent transactions and financial commitments to ensure that your
                account
                is in good standing.
            </div>
            <a href="#!" class="text-reset text-decoration-underline ms-auto link-offset-2"><b>Action Now</b></a>
        </div>

        {{-- Row 4: Targets & Goals --}}
        {{-- <div class="d-flex align-items-center mb-3 mt-2">
            <h4 class="fw-bold fs-md">My Targets &amp; Goals</h4>
            <a href="#!" class="text-decoration-underline fw-semibold fs-15 ms-auto link-offset-2 link-dark">See All</a>
        </div> --}}

        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xxl-5">
            <div class="col">
                <div class="card border-0 rounded-3 text-white"
                    style="background-image: url(assets/images/stock/small-1.jpg); background-size: cover">
                    <div class="card-body bg-gradient bg-primary bg-opacity-90 rounded-3">
                        <iconify-icon icon="solar:bus-bold-duotone" class="fs-36"></iconify-icon>
                        <p class="text-white text-opacity-75 mb-1 text-uppercase">Transaksi Hari ini</p>
                        <h3 class="fw-semibold mb-2 fs-20 text-white">New Car</h3>
                        <h4 class="fw-medium fs-16 mb-1 text-white">$<span data-target="25000">0</span></h4>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 rounded-3 text-white"
                    style="background-image: url(assets/images/stock/small-4.jpg); background-size: cover">
                    <div class="card-body bg-gradient bg-danger bg-opacity-90 rounded-3">
                        <iconify-icon icon="solar:home-2-bold-duotone" class="fs-36"></iconify-icon>
                        <p class="text-white text-opacity-75 mb-1 text-uppercase">Total Produk</p>
                        <h3 class="fw-semibold mb-2 fs-20 text-white">New Home</h3>
                        <h4 class="fw-medium fs-16 mb-1 text-white">$<span data-target="120000">0</span></h4>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 rounded-3 text-white"
                    style="background-image: url(assets/images/stock/small-5.jpg); background-size: cover">
                    <div class="card-body bg-gradient bg-info bg-opacity-90 rounded-3">
                        <iconify-icon icon="solar:banknote-2-bold-duotone" class="fs-36"></iconify-icon>
                        <p class="text-white text-opacity-75 mb-1 text-uppercase">Barang Tersedia</p>
                        <h3 class="fw-semibold mb-2 fs-20 text-white">Emergency Fund</h3>
                        <h4 class="fw-medium fs-16 mb-1 text-white">$<span data-target="10000">0</span></h4>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row-->

        {{-- Row 3: Recent Transactions Table --}}
        <div class="row">
            <div class="col-12">
                <div data-table data-table-rows-per-page="8" class="card">
                    <div class="card-header border-light justify-content-between">
                        <h4 class="card-title">
                            Riwayat Transaksi saya (Hari ini)
                        </h4>
                        <div class="d-flex align-items-center gap-2">
                            <span class="me-2 fw-semibold">Filter By:</span>
                            <div class="app-search">
                                <select data-table-filter="transaction-status"
                                    class="form-select form-control my-1 my-md-0">
                                    <option value="All">All Status</option>
                                    <option value="Success">Success</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Failed">Failed</option>
                                    <option value="Processing">Processing</option>
                                    <option value="Onhold">On Hold</option>
                                </select>
                                <i class="ti ti-filter-2 app-search-icon text-muted"></i>
                            </div>

                            <div>
                                <select data-table-set-rows-per-page class="form-select form-control my-1 my-md-0">
                                    <option value="5">5</option>
                                    <option value="10" selected>10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                </select>
                            </div>
                            <div class="app-search">
                                <input data-table-search type="search" class="form-control"
                                    placeholder="Search transactions..." />
                                <i class="ti ti-search app-search-icon text-muted"></i>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-custom table-nowrap table-centered table-select table-hover w-100 mb-0">
                            <thead class="bg-light align-middle bg-opacity-25 thead-sm">
                                <tr class="text-uppercase fs-xxs">
                                    <th data-table-sort class="text-muted">ID</th>
                                    <th data-table-sort class="text-muted">Jam</th>
                                    <th class="text-muted">Total</th>
                                    <th data-table-sort class="text-muted">Bayar</th>
                                    <th data-table-sort data-column="transaction-status" class="text-muted">Kembalian</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataPenjualan as $data)
                                    <tr>
                                        <td><a href="#!" class="fw-medium text-reset">#TX901</a></td>
                                        <td>
                                            <span
                                                class="align-middle text-reset">{{ \Carbon\Carbon::parse($data->tanggal_penjualan)->format('H:i') }}</span>
                                        </td>
                                        <td>{{ $data->total_harga ?? '' }}</td>
                                        <td class="text-success">USD $299.00</td>
                                        <td class="text-danger">Rp. 100.000</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer border-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <div data-table-pagination-info="transactions"></div>
                            <div data-table-pagination></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->



    @endsection

    @push('scripts')
        <script src="assets/js/pages/dashboard-finance.js"></script>
    @endpush
