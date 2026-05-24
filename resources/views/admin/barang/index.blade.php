@extends('layouts.app')

@section('title', 'Data Barang')

@section('page-title')
    <div class="page-title-head d-flex align-items-center">
        <div class="flex-grow-1">
            <h4 class="page-main-title m-0">Data Barang</h4>
        </div>
        <div class="text-end">
            <ol class="breadcrumb m-0 py-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                <li class="breadcrumb-item active">Data Barang</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')

    {{-- Alert --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible d-flex align-items-center rounded-4 mb-4" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <i class="ti ti-circle-check fs-24 me-2"></i>
            <div>
                <strong>Berhasil!</strong> {{ session('success') }}
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible d-flex align-items-center rounded-4 mb-4" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <i class="ti ti-alert-circle fs-24 me-2"></i>
            <div>
                <strong>Gagal menambahkan barang:</strong>
                <ul class="mb-0 mt-1 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

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
                        <a href="#!" class="btn btn-primary ms-1" data-bs-toggle="modal"
                            data-bs-target="#addBarangModal"> <i class="ti ti-plus fs-sm me-2"></i> Tambah Barang </a>
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
                                        {{-- Detail --}}
                                        <button class="btn btn-default btn-icon btn-sm btn-detail-barang"
                                            data-id="{{ $data->id }}" title="Lihat Detail">
                                            <i class="ti ti-eye fs-lg"></i>
                                        </button>

                                        {{-- Edit --}}
                                        <button class="btn btn-default btn-icon btn-sm btn-edit-barang" title="Edit"
                                            data-id="{{ $data->id }}" data-kode="{{ $data->kode_barang }}"
                                            data-nama="{{ $data->nama_barang }}" data-kategori="{{ $data->kategori_id }}"
                                            data-supplier="{{ $data->supplier_id }}"
                                            data-harga-beli="{{ $data->harga_beli }}"
                                            data-harga-jual="{{ $data->harga_jual }}" data-stok="{{ $data->stok }}"
                                            data-satuan="{{ $data->satuan }}">
                                            <i class="ti ti-edit fs-lg"></i>
                                        </button>

                                        {{-- Hapus --}}
                                        <button class="btn btn-default btn-icon btn-sm btn-hapus-barang" title="Hapus"
                                            data-id="{{ $data->id }}" data-nama="{{ $data->nama_barang }}">
                                            <i class="ti ti-trash fs-lg"></i>
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

    {{-- ======================================================= --}}
    {{-- MODAL EDIT BARANG                                        --}}
    {{-- ======================================================= --}}
    <div class="modal fade" id="editBarangModal" tabindex="-1" aria-labelledby="editBarangModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded-4 border-0 shadow">
                <div class="modal-header border-0 pb-0 px-4 pt-4">
                    <div class="d-flex align-items-center gap-2">
                        <div class="bg-warning-subtle rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 42px; height: 42px;">
                            <i class="ti ti-edit text-warning fs-20"></i>
                        </div>
                        <div>
                            <h5 class="modal-title fw-bold mb-0" id="editBarangModalLabel">Edit Barang</h5>
                            <small class="text-muted">Perbarui data barang</small>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="formEditBarang" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body px-4 pt-4 pb-0">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Kode Barang</label>
                                <input type="text" class="form-control rounded-3" name="kode_barang"
                                    id="edit_kode_barang" placeholder="e.g. BRG-0001" required />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Nama Barang</label>
                                <input type="text" class="form-control rounded-3" name="nama_barang"
                                    id="edit_nama_barang" placeholder="e.g. Beras Pandan Wangi" required />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Kategori</label>
                                <select name="kategori_id" id="edit_kategori_id" class="form-select rounded-3" required>
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($dataKategori as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Supplier</label>
                                <select name="supplier_id" id="edit_supplier_id" class="form-select rounded-3" required>
                                    <option value="">Pilih Supplier</option>
                                    @foreach ($dataSupplier as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_supplier }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Harga Beli</label>
                                <div class="input-group">
                                    <span class="input-group-text rounded-start-3">Rp</span>
                                    <input type="number" class="form-control rounded-end-3" name="harga_beli"
                                        id="edit_harga_beli" placeholder="0" min="0" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Harga Jual</label>
                                <div class="input-group">
                                    <span class="input-group-text rounded-start-3">Rp</span>
                                    <input type="number" class="form-control rounded-end-3" name="harga_jual"
                                        id="edit_harga_jual" placeholder="0" min="0" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Stok</label>
                                <input type="number" class="form-control rounded-3" name="stok" id="edit_stok"
                                    placeholder="0" min="0" required />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Satuan</label>
                                <input type="text" class="form-control rounded-3" name="satuan" id="edit_satuan"
                                    placeholder="e.g. Pcs, Kg, Liter" required />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 px-4 pb-4 pt-4 gap-2">
                        <button type="button" class="btn btn-light rounded-3" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-warning rounded-3 text-white">
                            <i class="ti ti-device-floppy me-1"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-- ======================================================= --}}
    {{-- MODAL KONFIRMASI HAPUS                                   --}}
    {{-- ======================================================= --}}
    <div class="modal fade" id="hapusBarangModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
            <div class="modal-content rounded-4 border-0 shadow">
                <div class="modal-body px-4 pt-4 pb-3 text-center">
                    <div class="bg-danger-subtle rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3"
                        style="width: 64px; height: 64px;">
                        <i class="ti ti-trash text-danger fs-28"></i>
                    </div>
                    <h5 class="fw-bold mb-1">Hapus Barang?</h5>
                    <p class="text-muted mb-0">
                        Yakin ingin menghapus barang
                        <strong id="hapus-nama-barang" class="text-dark">—</strong>?
                        <br><small>Tindakan ini tidak bisa dibatalkan.</small>
                    </p>
                </div>
                <div class="modal-footer border-0 px-4 pb-4 pt-0 gap-2">
                    <button type="button" class="btn btn-light rounded-3 flex-fill"
                        data-bs-dismiss="modal">Batal</button>
                    <form id="formHapusBarang" method="POST" class="flex-fill">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger rounded-3 w-100">
                            <i class="ti ti-trash me-1"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Tambah --}}

    <div class="modal fade" id="addBarangModal" tabindex="-1" aria-labelledby="addBarangModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded-4 border-0 shadow">
                <div class="modal-header border-0 pb-0 px-4 pt-4">
                    <div class="d-flex align-items-center gap-2">
                        <div class="bg-primary-subtle rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 42px; height: 42px;">
                            <i class="ti ti-package text-primary fs-20"></i>
                        </div>
                        <div>
                            <h5 class="modal-title fw-bold mb-0" id="addBarangModalLabel">Tambah Barang Baru</h5>
                            <small class="text-muted">Masukkan data barang kelontong baru</small>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('admin.data-barang.store') }}" method="POST">
                    @csrf
                    <div class="modal-body px-4 pt-4 pb-0">
                        <div class="row g-3">
                            <!-- Kode Barang -->
                            <div class="col-md-6">
                                <label for="kode_barang" class="form-label fw-semibold">Kode Barang</label>
                                <input type="text" class="form-control rounded-3" id="kode_barang" name="kode_barang"
                                    placeholder="e.g. BRG-0001" value="{{ old('kode_barang') }}" required />
                            </div>

                            <!-- Nama Barang -->
                            <div class="col-md-6">
                                <label for="nama_barang" class="form-label fw-semibold">Nama Barang</label>
                                <input type="text" class="form-control rounded-3" id="nama_barang" name="nama_barang"
                                    placeholder="e.g. Beras Pandan Wangi" value="{{ old('nama_barang') }}" required />
                            </div>

                            <!-- Kategori -->
                            <div class="col-md-6">
                                <label for="kategori_id" class="form-label fw-semibold">Kategori</label>
                                <select id="kategori_id" name="kategori_id" class="form-select rounded-3" required>
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($dataKategori as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('kategori_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Supplier -->
                            <div class="col-md-6">
                                <label for="supplier_id" class="form-label fw-semibold">Supplier</label>
                                <select id="supplier_id" name="supplier_id" class="form-select rounded-3" required>
                                    <option value="">Pilih Supplier</option>
                                    @foreach ($dataSupplier as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('supplier_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama_supplier }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Harga Beli -->
                            <div class="col-md-6">
                                <label for="harga_beli" class="form-label fw-semibold">Harga Beli</label>
                                <div class="input-group">
                                    <span class="input-group-text rounded-start-3">Rp</span>
                                    <input type="number" class="form-control rounded-end-3" id="harga_beli"
                                        name="harga_beli" placeholder="0" min="0"
                                        value="{{ old('harga_beli') }}" required />
                                </div>
                            </div>

                            <!-- Harga Jual -->
                            <div class="col-md-6">
                                <label for="harga_jual" class="form-label fw-semibold">Harga Jual</label>
                                <div class="input-group">
                                    <span class="input-group-text rounded-start-3">Rp</span>
                                    <input type="number" class="form-control rounded-end-3" id="harga_jual"
                                        name="harga_jual" placeholder="0" min="0"
                                        value="{{ old('harga_jual') }}" required />
                                </div>
                            </div>

                            <!-- Stok -->
                            <div class="col-md-6">
                                <label for="stok" class="form-label fw-semibold">Stok Awal</label>
                                <input type="number" class="form-control rounded-3" id="stok" name="stok"
                                    placeholder="0" min="0" value="{{ old('stok', 0) }}" required />
                            </div>

                            <!-- Satuan -->
                            <div class="col-md-6">
                                <label for="satuan" class="form-label fw-semibold">Satuan</label>
                                <input type="text" class="form-control rounded-3" id="satuan" name="satuan"
                                    placeholder="e.g. Pcs, Kg, Liter" value="{{ old('satuan') }}" required />
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer border-0 px-4 pb-4 pt-4 gap-2">
                        <button type="button" class="btn btn-light rounded-3" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary rounded-3">Simpan Barang</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end modal-->
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


        // ─── Tombol EDIT ─────────────────────────────────────────────────────────
        const URL_UPDATE_BASE = "{{ url('admin/data-barang') }}";

        $(document).on('click', '.btn-edit-barang', function() {
            const d = $(this).data();

            // Set action form ke PUT /admin/data-barang/{id}
            $('#formEditBarang').attr('action', URL_UPDATE_BASE + '/' + d.id);

            // Prefill semua field
            $('#edit_kode_barang').val(d.kode);
            $('#edit_nama_barang').val(d.nama);
            $('#edit_harga_beli').val(d.hargaBeli);
            $('#edit_harga_jual').val(d.hargaJual); // lihat catatan di bawah
            $('#edit_stok').val(d.stok);
            $('#edit_satuan').val(d.satuan);

            // Set dropdown kategori & supplier
            $('#edit_kategori_id').val(d.kategori);
            $('#edit_supplier_id').val(d.supplier);

            // Buka modal
            new bootstrap.Modal(document.getElementById('editBarangModal')).show();
        });

        // ─── Tombol HAPUS ────────────────────────────────────────────────────────
        $(document).on('click', '.btn-hapus-barang', function() {
            const id = $(this).data('id');
            const nama = $(this).data('nama');

            $('#hapus-nama-barang').text(nama);
            $('#formHapusBarang').attr('action', URL_UPDATE_BASE + '/' + id);

            new bootstrap.Modal(document.getElementById('hapusBarangModal')).show();
        });
    </script>
@endpush
