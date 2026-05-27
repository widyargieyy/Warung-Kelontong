@extends('layouts.app')

@section('title', 'Data Supplier')

@section('page-title')
    <div class="page-title-head d-flex align-items-center">
        <div class="flex-grow-1">
            <h4 class="page-main-title m-0">Data Supplier</h4>
        </div>
        <div class="text-end">
            <ol class="breadcrumb m-0 py-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                <li class="breadcrumb-item active">Data Supplier</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')

    {{-- ======================================================= --}}
    {{-- ALERT                                                    --}}
    {{-- ======================================================= --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible d-flex align-items-center rounded-4 mb-4" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <i class="ti ti-circle-check fs-24 me-2"></i>
            <div><strong>Berhasil!</strong> {{ session('success') }}</div>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible d-flex align-items-center rounded-4 mb-4" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <i class="ti ti-alert-circle fs-24 me-2"></i>
            <div>
                <strong>Validasi gagal:</strong>
                <ul class="mb-0 mt-1 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    {{-- ======================================================= --}}
    {{-- TABEL                                                    --}}
    {{-- ======================================================= --}}
    <div class="row">
        <div class="col-12">
            <div data-table data-table-rows-per-page="10" class="card">
                <div class="card-header border-light justify-content-between">
                    <h4 class="card-title">
                        Daftar Supplier
                        <span class="text-muted fw-normal fs-14">({{ $totalSupplier ?? 0 }} Supplier)</span>
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
                            <input data-table-search type="search" class="form-control" placeholder="Cari Supplier..." />
                            <i class="ti ti-search app-search-icon text-muted"></i>
                        </div>
                        <a href="#!" class="btn btn-primary ms-1" data-bs-toggle="modal"
                            data-bs-target="#addSupplierModal">
                            <i class="ti ti-plus fs-sm me-2"></i> Tambah Supplier
                        </a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-custom table-nowrap table-centered table-select table-hover w-100 mb-0">
                        <thead class="bg-light align-middle bg-opacity-25 thead-sm">
                            <tr class="text-uppercase fs-xxs">
                                <th class="text-muted" style="width: 50px;">No</th>
                                <th data-table-sort class="text-muted">Nama Supplier</th>
                                <th data-table-sort class="text-muted">No HP</th>
                                <th class="text-muted">Alamat</th>
                                <th class="text-muted">Jumlah Barang</th>
                                <th class="text-muted">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($dataSupplier as $i => $data)
                                <tr>
                                    <td class="text-muted">{{ $i + 1 }}</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="bg-success-subtle rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                                                style="width: 36px; height: 36px;">
                                                <i class="ti ti-building-store text-success fs-16"></i>
                                            </div>
                                            <span class="fw-semibold">{{ $data->nama_supplier }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-1">
                                            <i class="ti ti-phone text-muted fs-14"></i>
                                            <span>{{ $data->no_hp }}</span>
                                        </div>
                                    </td>
                                    <td class="text-muted">
                                        <div class="d-flex align-items-center gap-1">
                                            <i class="ti ti-map-pin text-muted fs-14"></i>
                                            <span>{{ $data->alamat ?? '—' }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-success-subtle text-success rounded-pill px-3 py-2">
                                            {{ $data->barang_count }} barang
                                        </span>
                                    </td>
                                    <td class="pe-4">
                                        {{-- Detail --}}
                                        <button class="btn btn-default btn-icon btn-sm btn-detail-supplier"
                                            title="Lihat Detail" data-nama="{{ $data->nama_supplier }}"
                                            data-nohp="{{ $data->no_hp }}" data-alamat="{{ $data->alamat ?? '—' }}"
                                            data-jumlah="{{ $data->barang_count }}"
                                            data-created="{{ $data->created_at->translatedFormat('d F Y') }}"
                                            data-updated="{{ $data->updated_at->translatedFormat('d F Y') }}">
                                            <i class="ti ti-eye fs-lg"></i>
                                        </button>

                                        {{-- Edit --}}
                                        <button class="btn btn-default btn-icon btn-sm btn-edit-supplier" title="Edit"
                                            data-id="{{ $data->id }}" data-nama="{{ $data->nama_supplier }}"
                                            data-nohp="{{ $data->no_hp }}" data-alamat="{{ $data->alamat ?? '' }}">
                                            <i class="ti ti-edit fs-lg"></i>
                                        </button>

                                        {{-- Hapus --}}
                                        <button class="btn btn-default btn-icon btn-sm btn-hapus-supplier" title="Hapus"
                                            data-id="{{ $data->id }}" data-nama="{{ $data->nama_supplier }}">
                                            <i class="ti ti-trash fs-lg"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-5">
                                        <i class="ti ti-building-store fs-40 d-block mb-2 opacity-50"></i>
                                        Belum ada data supplier.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="card-footer border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div data-table-pagination-info="Supplier "></div>
                        <div data-table-pagination></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ======================================================= --}}
    {{-- MODAL DETAIL SUPPLIER                                    --}}
    {{-- ======================================================= --}}
    <div class="modal fade" id="modalDetailSupplier" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 440px;">
            <div class="modal-content rounded-4 border-0 shadow">

                <div class="modal-header border-0 pb-0 px-4 pt-4">
                    <div class="d-flex align-items-center gap-2">
                        <div class="bg-success-subtle rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 42px; height: 42px;">
                            <i class="ti ti-building-store text-success fs-20"></i>
                        </div>
                        <div>
                            <h5 class="modal-title fw-bold mb-0">Detail Supplier</h5>
                            <small class="text-muted" id="detail-sub-supplier">—</small>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body px-4 pt-3 pb-0">
                    <div class="text-center mb-4">
                        <div class="bg-success-subtle rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3"
                            style="width: 64px; height: 64px;">
                            <i class="ti ti-building-store text-success fs-28"></i>
                        </div>
                        <h5 class="fw-bold mb-1" id="detail-nama-supplier">—</h5>
                        <span class="badge bg-success-subtle text-success rounded-pill px-3" id="detail-badge-supplier">
                            0 barang
                        </span>
                    </div>

                    <div class="row g-2 mb-4">
                        <div class="col-6">
                            <div class="bg-light rounded-3 p-3 h-100">
                                <small class="text-muted d-block mb-1">
                                    <i class="ti ti-phone me-1"></i>No HP
                                </small>
                                <span class="fw-semibold" id="detail-nohp-supplier">—</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="bg-light rounded-3 p-3 h-100">
                                <small class="text-muted d-block mb-1">
                                    <i class="ti ti-calendar-plus me-1"></i>Dibuat Pada
                                </small>
                                <span class="fw-semibold" id="detail-created-supplier">—</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="bg-light rounded-3 p-3">
                                <small class="text-muted d-block mb-1">
                                    <i class="ti ti-map-pin me-1"></i>Alamat
                                </small>
                                <span class="fw-semibold" id="detail-alamat-supplier">—</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="bg-light rounded-3 p-3">
                                <small class="text-muted d-block mb-1">
                                    <i class="ti ti-calendar-event me-1"></i>Update Terakhir
                                </small>
                                <span class="fw-semibold" id="detail-updated-supplier">—</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer border-0 px-4 pb-4 pt-2">
                    <button type="button" class="btn btn-light rounded-3 w-100" data-bs-dismiss="modal">
                        <i class="ti ti-x me-1"></i> Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- ======================================================= --}}
    {{-- MODAL TAMBAH SUPPLIER                                    --}}
    {{-- ======================================================= --}}
    <div class="modal fade" id="addSupplierModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 500px;">
            <div class="modal-content rounded-4 border-0 shadow">
                <div class="modal-header border-0 pb-0 px-4 pt-4">
                    <div class="d-flex align-items-center gap-2">
                        <div class="bg-primary-subtle rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 42px; height: 42px;">
                            <i class="ti ti-building-store text-primary fs-20"></i>
                        </div>
                        <div>
                            <h5 class="modal-title fw-bold mb-0">Tambah Supplier Baru</h5>
                            <small class="text-muted">Masukkan data supplier barang</small>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('admin.data-supplier.store') }}" method="POST">
                    @csrf
                    <div class="modal-body px-4 pt-4 pb-0">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label fw-semibold">Nama Supplier</label>
                                <input type="text" class="form-control rounded-3" name="nama_supplier"
                                    placeholder="e.g. PT Indofood" value="{{ old('nama_supplier') }}" required />
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">No HP</label>
                                <div class="input-group">
                                    <span class="input-group-text rounded-start-3">
                                        <i class="ti ti-phone fs-15"></i>
                                    </span>
                                    <input type="text" class="form-control rounded-end-3" name="no_hp"
                                        placeholder="e.g. 08123456789" value="{{ old('no_hp') }}" required />
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">
                                    Alamat
                                    <span class="text-muted fw-normal">(opsional)</span>
                                </label>
                                <textarea class="form-control rounded-3" name="alamat" rows="3" placeholder="Alamat lengkap supplier...">{{ old('alamat') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 px-4 pb-4 pt-4 gap-2">
                        <button type="button" class="btn btn-light rounded-3" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary rounded-3">
                            <i class="ti ti-plus me-1"></i> Simpan Supplier
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- ======================================================= --}}
    {{-- MODAL EDIT SUPPLIER                                      --}}
    {{-- ======================================================= --}}
    <div class="modal fade" id="editSupplierModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 500px;">
            <div class="modal-content rounded-4 border-0 shadow">
                <div class="modal-header border-0 pb-0 px-4 pt-4">
                    <div class="d-flex align-items-center gap-2">
                        <div class="bg-warning-subtle rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 42px; height: 42px;">
                            <i class="ti ti-edit text-warning fs-20"></i>
                        </div>
                        <div>
                            <h5 class="modal-title fw-bold mb-0">Edit Supplier</h5>
                            <small class="text-muted">Perbarui data supplier</small>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="formEditSupplier" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body px-4 pt-4 pb-0">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label fw-semibold">Nama Supplier</label>
                                <input type="text" class="form-control rounded-3" name="nama_supplier"
                                    id="edit_nama_supplier" placeholder="e.g. PT Indofood" required />
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">No HP</label>
                                <div class="input-group">
                                    <span class="input-group-text rounded-start-3">
                                        <i class="ti ti-phone fs-15"></i>
                                    </span>
                                    <input type="text" class="form-control rounded-end-3" name="no_hp"
                                        id="edit_no_hp" placeholder="e.g. 08123456789" required />
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">
                                    Alamat
                                    <span class="text-muted fw-normal">(opsional)</span>
                                </label>
                                <textarea class="form-control rounded-3" name="alamat" id="edit_alamat" rows="3"
                                    placeholder="Alamat lengkap supplier..."></textarea>
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
    <div class="modal fade" id="hapusSupplierModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
            <div class="modal-content rounded-4 border-0 shadow">
                <div class="modal-body px-4 pt-4 pb-3 text-center">
                    <div class="bg-danger-subtle rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3"
                        style="width: 64px; height: 64px;">
                        <i class="ti ti-trash text-danger fs-28"></i>
                    </div>
                    <h5 class="fw-bold mb-1">Hapus Supplier?</h5>
                    <p class="text-muted mb-0">
                        Yakin ingin menghapus supplier
                        <strong id="hapus-nama-supplier" class="text-dark">—</strong>?
                        <br><small>Data barang yang terhubung ke supplier ini juga akan terpengaruh.</small>
                    </p>
                </div>
                <div class="modal-footer border-0 px-4 pb-4 pt-0 gap-2">
                    <button type="button" class="btn btn-light rounded-3 flex-fill"
                        data-bs-dismiss="modal">Batal</button>
                    <form id="formHapusSupplier" method="POST" class="flex-fill">
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

@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(function() {

            const URL_BASE = "{{ url('admin/data-supplier') }}";

            // ─── DETAIL ──────────────────────────────────────────────────────────
            $(document).on('click', '.btn-detail-supplier', function() {
                const d = $(this).data();

                $('#detail-sub-supplier').text(d.nama);
                $('#detail-nama-supplier').text(d.nama);
                $('#detail-nohp-supplier').text(d.nohp);
                $('#detail-alamat-supplier').text(d.alamat);
                $('#detail-badge-supplier').text(d.jumlah + ' barang');
                $('#detail-created-supplier').text(d.created);
                $('#detail-updated-supplier').text(d.updated);

                new bootstrap.Modal(document.getElementById('modalDetailSupplier')).show();
            });

            // ─── EDIT ────────────────────────────────────────────────────────────
            $(document).on('click', '.btn-edit-supplier', function() {
                const d = $(this).data();

                $('#formEditSupplier').attr('action', URL_BASE + '/' + d.id);
                $('#edit_nama_supplier').val(d.nama);
                $('#edit_no_hp').val(d.nohp);
                $('#edit_alamat').val(d.alamat);

                new bootstrap.Modal(document.getElementById('editSupplierModal')).show();
            });

            // ─── HAPUS ───────────────────────────────────────────────────────────
            $(document).on('click', '.btn-hapus-supplier', function() {
                const d = $(this).data();

                $('#hapus-nama-supplier').text(d.nama);
                $('#formHapusSupplier').attr('action', URL_BASE + '/' + d.id);

                new bootstrap.Modal(document.getElementById('hapusSupplierModal')).show();
            });

        });
    </script>
@endpush
