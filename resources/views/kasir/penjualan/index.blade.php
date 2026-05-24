@extends('layouts.app')

@section('title', 'Transaksi Penjualan')

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
                        <span class="text-muted fw-normal fs-14">({{ $totalBarang }} Barang)</span>
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
                                    <td class="pe-4">
                                        {{-- Tombol tambah → kirim data barang via data attribute --}}
                                        <button class="btn btn-primary btn-sm rounded-pill px-3 btn-tambah-barang"
                                            data-id="{{ $data->id }}" {{ $data->stok <= 0 ? 'disabled' : '' }}>
                                            <i class="ti ti-plus me-1"></i> Tambah
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
    {{-- KERANJANG + RINGKASAN TRANSAKSI                          --}}
    {{-- ======================================================= --}}
    <div class="row">

        {{-- Keranjang Belanja --}}
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title flex-grow-1">
                        Keranjang Belanja
                        <span id="cart-count" class="badge bg-primary-subtle text-primary rounded-pill ms-1">0</span>
                    </h4>
                    <a href="#" id="btn-hapus-semua"
                        class="text-decoration-underline link-offset-2 fw-medium text-danger">
                        Hapus Semua
                    </a>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-custom align-middle mb-0">
                            <thead class="bg-light align-middle bg-opacity-25 thead-sm">
                                <tr class="text-uppercase fs-xxs">
                                    <th>Barang</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Subtotal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="cart-body">
                                {{-- Diisi oleh jQuery --}}
                                <tr id="cart-empty-row">
                                    <td colspan="5" class="text-center text-muted py-4">
                                        <i class="ti ti-shopping-cart-off fs-32 d-block mb-2 opacity-50"></i>
                                        Keranjang masih kosong
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Ringkasan Transaksi --}}
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 sticky-top" style="top: 20px;">

                {{-- Header --}}
                <div class="card-header pt-4 px-4">
                    <div class="d-flex align-items-center gap-2">
                        <div class="bg-primary-subtle rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 45px; height: 45px;">
                            <i class="ti ti-shopping-cart text-primary fs-22"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-0">Ringkasan Transaksi</h5>
                            <small class="text-muted">Detail pembayaran pelanggan</small>
                        </div>
                    </div>
                </div>

                <div class="card-body px-4 pb-4">

                    {{-- Total Belanja --}}
                    <div class="bg-light rounded-4 p-4 mb-4 text-center">
                        <small class="text-muted d-block mb-1">Total Belanja</small>
                        <h1 class="fw-bold text-primary mb-0" id="total-belanja">Rp 0</h1>
                    </div>

                    {{-- Uang Bayar --}}
                    <div class="mb-4">
                        <label class="form-label fw-semibold mb-2">Uang Bayar</label>
                        <div class="position-relative">
                            <span class="position-absolute top-50 start-0 translate-middle-y ms-3 fw-bold text-success">
                                Rp
                            </span>

                            <input type="text" id="uang-bayar"
                                class="form-control form-control-lg rounded-4 ps-5 fw-semibold" placeholder="0"
                                autocomplete="off">
                        </div>
                    </div>

                    {{-- Kembalian --}}
                    <div class="bg-success-subtle rounded-4 p-3 mb-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <small class="text-muted d-block">Kembalian</small>
                                <h4 class="fw-bold text-success mb-0" id="kembalian">Rp 0</h4>
                            </div>
                            <i class="ti ti-cash-banknote text-success fs-32"></i>
                        </div>
                    </div>

                    {{-- Tombol --}}
                    <div class="d-grid gap-2">
                        <button id="btn-simpan" class="btn btn-success btn-lg rounded-4 fw-semibold" disabled>
                            <i class="ti ti-device-floppy me-1"></i> Simpan Transaksi
                        </button>
                        <button id="btn-reset" class="btn btn-light rounded-4">
                            <i class="ti ti-refresh me-1"></i> Reset
                        </button>
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(function() {

            const URL_ADD = "{{ route('kasir.cart.add') }}";
            const URL_UPDATE = "{{ route('kasir.cart.update') }}";
            const URL_REMOVE = "{{ route('kasir.cart.remove') }}";
            const URL_CLEAR = "{{ route('kasir.cart.clear') }}";
            const URL_GET = "{{ route('kasir.cart.get') }}";
            const URL_SIMPAN = "{{ route('kasir.simpan') }}";
            const CSRF = "{{ csrf_token() }}";

            function rupiah(angka) {
                return 'Rp ' + parseInt(angka).toLocaleString('id-ID');
            }

            function renderCart(cart) {
                const $body = $('#cart-body');
                const $empty = $('#cart-empty-row');
                $body.find('tr:not(#cart-empty-row)').remove();

                if (cart.count === 0) {
                    $empty.show();
                    $('#total-belanja').text('Rp 0');
                    $('#kembalian').text('Rp 0');
                    $('#cart-count').text('0');
                    $('#btn-simpan').prop('disabled', true);
                    return;
                }

                $empty.hide();
                $('#cart-count').text(cart.count);
                $('#total-belanja').text(cart.total_fmt);
                $('#btn-simpan').prop('disabled', false);

                hitungKembalian(cart.total);

                $.each(cart.items, function(i, item) {
                    const row = `
                <tr data-id="${item.barang_id}">
                    <td>
                        <h6 class="mb-0 fs-sm">${item.nama_barang}</h6>
                        <small class="text-muted">${item.kode_barang}</small>
                    </td>
                    <td>${item.harga_fmt}</td>
                    <td>
                        <div class="input-group input-group-sm" style="max-width: 120px;">
                            <button class="btn btn-outline-secondary btn-qty-minus" type="button"
                                data-id="${item.barang_id}">
                                <i class="ti ti-minus"></i>
                            </button>
                            <input type="number"
                                class="form-control form-control-sm text-center border-0 input-qty"
                                data-id="${item.barang_id}"
                                value="${item.qty}"
                                min="1" max="${item.stok}">
                            <button class="btn btn-outline-secondary btn-qty-plus" type="button"
                                data-id="${item.barang_id}" data-stok="${item.stok}">
                                <i class="ti ti-plus"></i>
                            </button>
                        </div>
                    </td>
                    <td class="fw-semibold subtotal-item">${item.subtotal_fmt}</td>
                    <td>
                        <a href="#" class="text-danger btn-hapus-item" data-id="${item.barang_id}">
                            <i class="ti ti-x fs-lg"></i>
                        </a>
                    </td>
                </tr>`;
                    $body.append(row);
                });
            }

            // ─── Hitung kembalian realtime ────────────────────────────────────────
            function hitungKembalian(total) {
                const bayar = parseInt(
                    $('#uang-bayar')
                    .val()
                    .replace(/\./g, '')
                ) || 0;
                const kembali = bayar - total;
                const $el = $('#kembalian');

                if (kembali < 0) {
                    $el.text('Kurang ' + rupiah(Math.abs(kembali))).removeClass('text-success').addClass(
                        'text-danger');
                } else {
                    $el.text(rupiah(kembali)).removeClass('text-danger').addClass('text-success');
                }
            }

            // ─── Ambil total aktif dari DOM ───────────────────────────────────────
            function getTotal() {
                const txt = $('#total-belanja').text().replace(/[^0-9]/g, '');
                return parseInt(txt) || 0;
            }

            // ─── AJAX helper dengan CSRF ──────────────────────────────────────────
            function ajaxPost(url, data, callback) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: Object.assign({
                        _token: CSRF
                    }, data),
                    success: function(res) {
                        if (res.success) {
                            renderCart(res.cart);
                            if (callback) callback(res);
                        } else {
                            toastError(res.message || 'Terjadi kesalahan.');
                        }
                    },
                    error: function(xhr) {
                        const msg = xhr.responseJSON?.message || 'Request gagal.';
                        toastError(msg);
                    }
                });
            }

            // ─── Toast notifikasi sederhana ───────────────────────────────────────
            function toastSuccess(msg) {
                // Gunakan alert Bootstrap jika tersedia, atau native
                if (typeof Swal !== 'undefined') {
                    Swal.fire({
                        icon: 'success',
                        title: msg,
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000
                    });
                } else {
                    alert('✅ ' + msg);
                }
            }

            function toastError(msg) {
                if (typeof Swal !== 'undefined') {
                    Swal.fire({
                        icon: 'error',
                        title: msg,
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                } else {
                    alert('❌ ' + msg);
                }
            }

            // ═══════════════════════════════════════════════════════════════════════
            // EVENT HANDLERS
            // ═══════════════════════════════════════════════════════════════════════

            // 1. Tombol "Tambah" di tabel barang
            $(document).on('click', '.btn-tambah-barang', function() {
                const id = $(this).data('id');
                ajaxPost(URL_ADD, {
                    barang_id: id
                }, function(res) {
                    // Optional: flash feedback di tombol
                });
            });

            // 2. Tombol minus qty di keranjang
            $(document).on('click', '.btn-qty-minus', function() {
                const id = $(this).data('id');
                const $in = $(`.input-qty[data-id="${id}"]`);
                const qty = Math.max(1, parseInt($in.val()) - 1);
                ajaxPost(URL_UPDATE, {
                    barang_id: id,
                    qty: qty
                });
            });

            // 3. Tombol plus qty di keranjang
            $(document).on('click', '.btn-qty-plus', function() {
                const id = $(this).data('id');
                const stok = parseInt($(this).data('stok'));
                const $in = $(`.input-qty[data-id="${id}"]`);
                const qty = Math.min(stok, parseInt($in.val()) + 1);
                ajaxPost(URL_UPDATE, {
                    barang_id: id,
                    qty: qty
                });
            });

            // 4. Input qty langsung diubah
            $(document).on('change', '.input-qty', function() {
                const id = $(this).data('id');
                const qty = parseInt($(this).val()) || 1;
                ajaxPost(URL_UPDATE, {
                    barang_id: id,
                    qty: qty
                });
            });

            // 5. Hapus satu item
            $(document).on('click', '.btn-hapus-item', function(e) {
                e.preventDefault();
                const id = $(this).data('id');
                ajaxPost(URL_REMOVE, {
                    barang_id: id
                });
            });

            // 6. Hapus semua
            $('#btn-hapus-semua').on('click', function(e) {
                e.preventDefault();
                if (!confirm('Yakin ingin mengosongkan keranjang?')) return;
                ajaxPost(URL_CLEAR, {});
            });

            // 7. Reset tombol
            $('#btn-reset').on('click', function() {
                if (!confirm('Reset keranjang dan uang bayar?')) return;
                ajaxPost(URL_CLEAR, {});
                $('#uang-bayar').val('');
                $('#kembalian').text('Rp 0').removeClass('text-danger').addClass('text-success');
            });

            // 8. Uang bayar → hitung kembalian realtime
            // Format realtime uang bayar
            $('#uang-bayar').on('input', function() {

                let value = $(this).val();

                // ambil angka saja
                value = value.replace(/[^0-9]/g, '');

                // format ke rupiah
                const formatted = parseInt(value || 0)
                    .toLocaleString('id-ID');

                // tampilkan ke input
                $(this).val(formatted);

                // hitung kembalian
                hitungKembalian(getTotal());
            });

            // 9. Simpan transaksi
            $('#btn-simpan').on('click', function() {
                const uangBayar = parseInt(
                    $('#uang-bayar')
                    .val()
                    .replace(/\./g, '')
                ) || 0;
                const total = getTotal();

                if (uangBayar <= 0) {
                    toastError('Isi uang bayar terlebih dahulu.');
                    return;
                }
                if (uangBayar < total) {
                    toastError('Uang bayar kurang dari total belanja.');
                    return;
                }

                $(this).prop('disabled', true).html(
                    '<span class="spinner-border spinner-border-sm me-1"></span> Menyimpan...');

                $.ajax({
                    url: URL_SIMPAN,
                    type: 'POST',
                    data: {
                        _token: CSRF,
                        uang_bayar: uangBayar
                    },
                    success: function(res) {
                        if (res.success) {
                            toastSuccess(res.message);
                            // Refresh tampilan cart (sudah dikosongkan di server)
                            $.get(URL_GET, function(r) {
                                renderCart(r.cart);
                                $('#uang-bayar').val('');
                                $('#kembalian').text('Rp 0').removeClass('text-danger')
                                    .addClass('text-success');
                            });
                        } else {
                            toastError(res.message);
                        }
                        $('#btn-simpan').prop('disabled', false)
                            .html('<i class="ti ti-device-floppy me-1"></i> Simpan Transaksi');
                    },
                    error: function(xhr) {
                        toastError(xhr.responseJSON?.message || 'Gagal menyimpan transaksi.');
                        $('#btn-simpan').prop('disabled', false)
                            .html('<i class="ti ti-device-floppy me-1"></i> Simpan Transaksi');
                    }
                });
            });

            // ═══════════════════════════════════════════════════════════════════════
            // INIT: load cart dari session saat halaman dibuka
            // ═══════════════════════════════════════════════════════════════════════
            $.get(URL_GET, function(res) {
                if (res.success) renderCart(res.cart);
            });

        });
    </script>
@endpush
