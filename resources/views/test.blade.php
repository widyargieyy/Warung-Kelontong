@extends('layouts.app')

@section('title', 'Finance Dashboard')

@section('page-title')
    <div class="page-title-head d-flex align-items-center">
        <div class="flex-grow-1">
            <h4 class="page-main-title m-0">Finance</h4>
        </div>
        <div class="text-end">
            <ol class="breadcrumb m-0 py-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Paces</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                <li class="breadcrumb-item active">Finance</li>
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
            We kindly encourage you to review your recent transactions and financial commitments to ensure that your account
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
                    <p class="text-white text-opacity-75 mb-1 text-uppercase">Goal</p>
                    <h3 class="fw-semibold mb-2 fs-20 text-white">New Car</h3>
                    <h4 class="fw-medium fs-16 mb-1 text-white">$<span data-target="25000">0</span></h4>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card border-0 rounded-3 text-white"
                style="background-image: url(assets/images/stock/small-2.jpg); background-size: cover">
                <div class="card-body bg-gradient bg-secondary bg-opacity-90 rounded-3">
                    <iconify-icon icon="solar:globus-bold-duotone" class="fs-36"></iconify-icon>
                    <p class="text-white text-opacity-75 mb-1 text-uppercase">Goal</p>
                    <h3 class="fw-semibold mb-2 fs-20 text-white">Vacation Trip</h3>
                    <h4 class="fw-medium fs-16 mb-1 text-white">$<span data-target="7500">0</span></h4>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card border-0 rounded-3 text-white"
                style="background-image: url(assets/images/stock/small-3.jpg); background-size: cover">
                <div class="card-body bg-gradient bg-warning bg-opacity-90 rounded-3">
                    <iconify-icon icon="solar:square-academic-cap-2-bold-duotone" class="fs-36"></iconify-icon>
                    <p class="text-white text-opacity-75 mb-1 text-uppercase">Goal</p>
                    <h3 class="fw-semibold mb-2 fs-20 text-white">Education</h3>
                    <h4 class="fw-medium fs-16 mb-1 text-white">$<span data-target="15200">0</span></h4>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card border-0 rounded-3 text-white"
                style="background-image: url(assets/images/stock/small-4.jpg); background-size: cover">
                <div class="card-body bg-gradient bg-danger bg-opacity-90 rounded-3">
                    <iconify-icon icon="solar:home-2-bold-duotone" class="fs-36"></iconify-icon>
                    <p class="text-white text-opacity-75 mb-1 text-uppercase">Goal</p>
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
                    <p class="text-white text-opacity-75 mb-1 text-uppercase">Goal</p>
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
                        Recent Transactions
                        <span class="text-muted fw-normal fs-14">(95.6k+ Transactions)</span>
                    </h4>
                    <div class="d-flex align-items-center gap-2">
                        <span class="me-2 fw-semibold">Filter By:</span>
                        <div class="app-search">
                            <select data-table-filter="transaction-status" class="form-select form-control my-1 my-md-0">
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
                                <th data-table-sort class="text-muted">Name / Business</th>
                                <th class="text-muted">Description</th>
                                <th data-table-sort class="text-muted">Amount</th>
                                <th data-table-sort class="text-muted">Timestamp</th>
                                <th data-table-sort class="text-muted">Type</th>
                                <th data-table-sort class="text-muted">Payment Method</th>
                                <th data-table-sort data-column="transaction-status" class="text-muted">Status</th>
                                <th class="text-muted">•••</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="#!" class="fw-medium text-reset">#TX901</a></td>
                                <td>
                                    <img src="assets/images/users/user-5.jpg" alt=""
                                        class="avatar-xs rounded-circle me-1" />
                                    <span class="align-middle text-reset">Sophia Miller</span>
                                </td>
                                <td>Subscription Renewal</td>
                                <td class="text-success">USD $299.00</td>
                                <td>22 Nov,25 <small class="text-muted">08:24 am</small></td>
                                <td>Credit</td>
                                <td><img src="assets/images/cards/visa.svg" height="24" class="me-1" /> *4321</td>
                                <td><span class="badge bg-success-subtle text-success p-1">Success</span></td>
                                <td><a href="#!" class="text-muted fs-20"><i class="ti ti-eye"></i></a></td>
                            </tr>
                            <tr>
                                <td><a href="#!" class="fw-medium text-reset">#TX900</a></td>
                                <td>
                                    <img src="assets/images/users/user-2.jpg" alt=""
                                        class="avatar-xs rounded-circle me-1" />
                                    <span class="align-middle">James Carter</span>
                                </td>
                                <td>Refund Processed</td>
                                <td class="text-danger">-USD $150.50</td>
                                <td>21 Nov,25 <small class="text-muted">07:40 pm</small></td>
                                <td>Debit</td>
                                <td><img src="assets/images/cards/mastercard.svg" height="24" class="me-1" /> *9333
                                </td>
                                <td><span class="badge bg-warning-subtle text-warning p-1">Pending</span></td>
                                <td><a href="#!" class="text-muted fs-20"><i class="ti ti-eye"></i></a></td>
                            </tr>
                            <tr>
                                <td><a href="#!" class="fw-medium text-reset">#TX899</a></td>
                                <td>
                                    <div class="avatar-xs d-inline-block me-1">
                                        <span
                                            class="avatar-title bg-secondary-subtle text-secondary fw-semibold rounded-circle">W</span>
                                    </div>
                                    WavePay
                                </td>
                                <td>Wallet Top-Up</td>
                                <td class="text-success">USD $620.00</td>
                                <td>21 Nov,25 <small class="text-muted">03:12 pm</small></td>
                                <td>Credit</td>
                                <td><img src="assets/images/cards/paypal.svg" height="24" class="me-1" /> PayPal
                                </td>
                                <td><span class="badge bg-success-subtle text-success p-1">Success</span></td>
                                <td><a href="#!" class="text-muted fs-20"><i class="ti ti-eye"></i></a></td>
                            </tr>
                            <tr>
                                <td><a href="#!" class="fw-medium text-reset">#TX898</a></td>
                                <td>
                                    <img src="assets/images/users/user-3.jpg" alt=""
                                        class="avatar-xs rounded-circle me-1" />
                                    <span class="align-middle">Liam Thompson</span>
                                </td>
                                <td>Service Charge</td>
                                <td class="text-danger">-USD $19.99</td>
                                <td>20 Nov,25 <small class="text-muted">11:09 am</small></td>
                                <td>Debit</td>
                                <td><img src="assets/images/cards/stripe.svg" height="24" class="me-1" /> Stripe
                                </td>
                                <td><span class="badge bg-danger-subtle text-danger p-1">Failed</span></td>
                                <td><a href="#!" class="text-muted fs-20"><i class="ti ti-eye"></i></a></td>
                            </tr>
                            <tr>
                                <td><a href="#!" class="fw-medium text-reset">#TX897</a></td>
                                <td>
                                    <img src="assets/images/users/user-4.jpg" alt=""
                                        class="avatar-xs rounded-circle me-1" />
                                    <span class="align-middle">Emma Stone</span>
                                </td>
                                <td>Invoice #2112</td>
                                <td class="text-success">EUR €420.72</td>
                                <td>18 Nov,25 <small class="text-muted">09:51 pm</small></td>
                                <td>Credit</td>
                                <td><img src="assets/images/cards/mastercard.svg" height="24" class="me-1" /> *2112
                                </td>
                                <td><span class="badge bg-success-subtle text-success p-1">Success</span></td>
                                <td><a href="#!" class="text-muted fs-20"><i class="ti ti-eye"></i></a></td>
                            </tr>
                            <tr>
                                <td><a href="#!" class="fw-medium text-reset">#TX889</a></td>
                                <td>
                                    <img src="assets/images/users/user-3.jpg" alt=""
                                        class="avatar-xs rounded-circle me-1" />
                                    <span class="align-middle">Emily Frost</span>
                                </td>
                                <td>Client Invoice #2455</td>
                                <td class="text-success">USD $980.00</td>
                                <td>09 Nov,24 <small class="text-muted">11:21 am</small></td>
                                <td>Credit</td>
                                <td><img src="assets/images/cards/paypal.svg" height="24" class="me-1" /> PayPal
                                </td>
                                <td><span class="badge bg-success-subtle text-success p-1">Success</span></td>
                                <td><a href="#!" class="text-muted fs-20"><i class="ti ti-eye"></i></a></td>
                            </tr>
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
