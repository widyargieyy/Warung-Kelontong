@extends('layouts.app')

@section('title', 'Data Kategori')

@section('page-title')
    <div class="page-title-head d-flex align-items-center">
        <div class="flex-grow-1">
            <h4 class="page-main-title m-0">Data Kategori</h4>
        </div>
        <div class="text-end">
            <ol class="breadcrumb m-0 py-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                <li class="breadcrumb-item active">Data Kategori</li>
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
                        Daftar Kategori
                        <span class="text-muted fw-normal fs-14">({{ $totalKategori ?? 0 }} Kategori)</span>
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
                            <input data-table-search type="search" class="form-control" placeholder="Cari Kategori..." />
                            <i class="ti ti-search app-search-icon text-muted"></i>
                        </div>
                        <a href="#!" class="btn btn-primary ms-1" data-bs-toggle="modal"
                            data-bs-target="#addKategoriModal">
                            <i class="ti ti-plus fs-sm me-2"></i> Tambah Kategori
                        </a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-custom table-nowrap table-centered table-select table-hover w-100 mb-0">
                        <thead class="bg-light align-middle bg-opacity-25 thead-sm">
                            <tr class="text-uppercase fs-xxs">
                                <th class="text-muted" style="width: 50px;">No</th>
                                <th data-table-sort class="text-muted">Nama Kategori</th>
                                <th class="text-muted">Deskripsi</th>
                                <th class="text-muted">Jumlah Barang</th>
                                <th class="text-muted">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($dataKategori as $i => $data)
                                <tr>
                                    <td class="text-muted">{{ $i + 1 }}</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="bg-primary-subtle rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                                                style="width: 34px; height: 34px;">
                                                <i class="ti ti-category text-primary fs-16"></i>
                                            </div>
                                            <span class="fw-semibold">{{ $data->nama_kategori }}</span>
                                        </div>
                                    </td>
                                    <td class="text-muted">
                                        {{ $data->deskripsi ?? '—' }}
                                    </td>
                                    <td>
                                        <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2">
                                            {{ $data->barang->count() }} barang
                                        </span>
                                    </td>
                                    <td class="pe-4">
                                        {{-- Detail --}}
                                        <button class="btn btn-default btn-icon btn-sm btn-detail-kategori"
                                            title="Lihat Detail" data-id="{{ $data->id }}"
                                            data-nama="{{ $data->nama_kategori }}"
                                            data-deskripsi="{{ $data->deskripsi ?? '—' }}"
                                            data-jumlah="{{ $data->barang->count() }}"
                                            data-created="{{ $data->created_at->translatedFormat('d F Y') }}"
                                            data-updated="{{ $data->updated_at->translatedFormat('d F Y') }}">
                                            <i class="ti ti-eye fs-lg"></i>
                                        </button>

                                        {{-- Edit --}}
                                        <button class="btn btn-default btn-icon btn-sm btn-edit-kategori" title="Edit"
                                            data-id="{{ $data->id }}" data-nama="{{ $data->nama_kategori }}"
                                            data-deskripsi="{{ $data->deskripsi ?? '' }}">
                                            <i class="ti ti-edit fs-lg"></i>
                                        </button>

                                        {{-- Hapus --}}
                                        <button class="btn btn-default btn-icon btn-sm btn-hapus-kategori" title="Hapus"
                                            data-id="{{ $data->id }}" data-nama="{{ $data->nama_kategori }}">
                                            <i class="ti ti-trash fs-lg"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">
                                        <i class="ti ti-mood-empty fs-40 d-block mb-2"></i>
                                        Belum ada data kategori.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="card-footer border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div data-table-pagination-info="Kategori "></div>
                        <div data-table-pagination></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ======================================================= --}}
    {{-- MODAL DETAIL KATEGORI                                    --}}
    {{-- ======================================================= --}}
    <div class="modal fade" id="modalDetailKategori" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 440px;">
            <div class="modal-content rounded-4 border-0 shadow">

                <div class="modal-header border-0 pb-0 px-4 pt-4">
                    <div class="d-flex align-items-center gap-2">
                        <div class="bg-primary-subtle rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 42px; height: 42px;">
                            <i class="ti ti-category text-primary fs-20"></i>
                        </div>
                        <div>
                            <h5 class="modal-title fw-bold mb-0">Detail Kategori</h5>
                            <small class="text-muted" id="detail-sub">—</small>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body px-4 pt-3 pb-0">
                    {{-- Nama --}}
                    <div class="text-center mb-4">
                        <div class="bg-primary-subtle rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3"
                            style="width: 64px; height: 64px;">
                            <i class="ti ti-category text-primary fs-28"></i>
                        </div>
                        <h5 class="fw-bold mb-1" id="detail-nama">—</h5>
                        <span class="badge bg-primary-subtle text-primary rounded-pill px-3" id="detail-badge-jumlah">
                            0 barang
                        </span>
                    </div>

                    {{-- Info Grid --}}
                    <div class="row g-2 mb-4">
                        <div class="col-12">
                            <div class="bg-light rounded-3 p-3">
                                <small class="text-muted d-block mb-1">
                                    <i class="ti ti-align-left me-1"></i>Deskripsi
                                </small>
                                <span class="fw-semibold" id="detail-deskripsi">—</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="bg-light rounded-3 p-3 h-100">
                                <small class="text-muted d-block mb-1">
                                    <i class="ti ti-calendar-plus me-1"></i>Dibuat Pada
                                </small>
                                <span class="fw-semibold" id="detail-created">—</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="bg-light rounded-3 p-3 h-100">
                                <small class="text-muted d-block mb-1">
                                    <i class="ti ti-calendar-event me-1"></i>Update Terakhir
                                </small>
                                <span class="fw-semibold" id="detail-updated">—</span>
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
    {{-- MODAL TAMBAH KATEGORI                                    --}}
    {{-- ======================================================= --}}
    <div class="modal fade" id="addKategoriModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 500px;">
            <div class="modal-content rounded-4 border-0 shadow">
                <div class="modal-header border-0 pb-0 px-4 pt-4">
                    <div class="d-flex align-items-center gap-2">
                        <div class="bg-primary-subtle rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 42px; height: 42px;">
                            <i class="ti ti-category text-primary fs-20"></i>
                        </div>
                        <div>
                            <h5 class="modal-title fw-bold mb-0">Tambah Kategori Baru</h5>
                            <small class="text-muted">Masukkan data kategori barang</small>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('admin.data-kategori.store') }}" method="POST">
                    @csrf
                    <div class="modal-body px-4 pt-4 pb-0">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label fw-semibold">Nama Kategori</label>
                                <input type="text" class="form-control rounded-3" name="nama_kategori"
                                    placeholder="e.g. Minuman, Sembako, Snack" value="{{ old('nama_kategori') }}"
                                    required />
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">
                                    Deskripsi
                                    <span class="text-muted fw-normal">(opsional)</span>
                                </label>
                                <textarea class="form-control rounded-3" name="deskripsi" rows="3"
                                    placeholder="Deskripsi singkat kategori ini...">{{ old('deskripsi') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 px-4 pb-4 pt-4 gap-2">
                        <button type="button" class="btn btn-light rounded-3" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary rounded-3">
                            <i class="ti ti-plus me-1"></i> Simpan Kategori
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- ======================================================= --}}
    {{-- MODAL EDIT KATEGORI                                      --}}
    {{-- ======================================================= --}}
    <div class="modal fade" id="editKategoriModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 500px;">
            <div class="modal-content rounded-4 border-0 shadow">
                <div class="modal-header border-0 pb-0 px-4 pt-4">
                    <div class="d-flex align-items-center gap-2">
                        <div class="bg-warning-subtle rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 42px; height: 42px;">
                            <i class="ti ti-edit text-warning fs-20"></i>
                        </div>
                        <div>
                            <h5 class="modal-title fw-bold mb-0">Edit Kategori</h5>
                            <small class="text-muted">Perbarui data kategori</small>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="formEditKategori" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body px-4 pt-4 pb-0">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label fw-semibold">Nama Kategori</label>
                                <input type="text" class="form-control rounded-3" name="nama_kategori"
                                    id="edit_nama_kategori" placeholder="e.g. Minuman" required />
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">
                                    Deskripsi
                                    <span class="text-muted fw-normal">(opsional)</span>
                                </label>
                                <textarea class="form-control rounded-3" name="deskripsi" id="edit_deskripsi" rows="3"
                                    placeholder="Deskripsi singkat kategori ini..."></textarea>
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
    <div class="modal fade" id="hapusKategoriModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
            <div class="modal-content rounded-4 border-0 shadow">
                <div class="modal-body px-4 pt-4 pb-3 text-center">
                    <div class="bg-danger-subtle rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3"
                        style="width: 64px; height: 64px;">
                        <i class="ti ti-trash text-danger fs-28"></i>
                    </div>
                    <h5 class="fw-bold mb-1">Hapus Kategori?</h5>
                    <p class="text-muted mb-0">
                        Yakin ingin menghapus kategori
                        <strong id="hapus-nama-kategori" class="text-dark">—</strong>?
                        <br><small>Barang yang terhubung ke kategori ini juga akan terpengaruh.</small>
                    </p>
                </div>
                <div class="modal-footer border-0 px-4 pb-4 pt-0 gap-2">
                    <button type="button" class="btn btn-light rounded-3 flex-fill"
                        data-bs-dismiss="modal">Batal</button>
                    <form id="formHapusKategori" method="POST" class="flex-fill">
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

            const URL_BASE = "{{ url('admin/data-kategori') }}";

            // ─── DETAIL ──────────────────────────────────────────────────────────
            $(document).on('click', '.btn-detail-kategori', function() {
                const d = $(this).data();

                $('#detail-sub').text(d.nama);
                $('#detail-nama').text(d.nama);
                $('#detail-deskripsi').text(d.deskripsi);
                $('#detail-badge-jumlah').text(d.jumlah + ' barang');
                $('#detail-created').text(d.created);
                $('#detail-updated').text(d.updated);

                new bootstrap.Modal(document.getElementById('modalDetailKategori')).show();
            });

            // ─── EDIT ────────────────────────────────────────────────────────────
            $(document).on('click', '.btn-edit-kategori', function() {
                const d = $(this).data();

                $('#formEditKategori').attr('action', URL_BASE + '/' + d.id);
                $('#edit_nama_kategori').val(d.nama);
                $('#edit_deskripsi').val(d.deskripsi);

                new bootstrap.Modal(document.getElementById('editKategoriModal')).show();
            });

            // ─── HAPUS ───────────────────────────────────────────────────────────
            $(document).on('click', '.btn-hapus-kategori', function() {
                const d = $(this).data();

                $('#hapus-nama-kategori').text(d.nama);
                $('#formHapusKategori').attr('action', URL_BASE + '/' + d.id);

                new bootstrap.Modal(document.getElementById('hapusKategoriModal')).show();
            });

        });
    </script>
@endpush
