<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login — SIMTOKO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600&family=DM+Sans:wght@300;400;500&display=swap"
        rel="stylesheet" />
    <style>
        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            font-weight: 500;
            color: var(--text-mid);
            text-decoration: none;
            margin-bottom: 1.5rem;
            padding: 6px 12px 6px 8px;
            border-radius: 8px;
            border: 1px solid var(--border);
            background: transparent;
            transition: background 0.2s, color 0.2s;
        }

        .btn-back:hover {
            background: var(--green-pale);
            color: var(--green-dark);
        }

        .btn-back i {
            font-size: 15px;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f0f2f0;
            font-family: 'DM Sans', sans-serif;
        }

        .wrapper {
            display: flex;
            width: 580px;
            min-height: 420px;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 8px 40px rgba(0, 0, 0, 0.12);
        }

        /* SIDEBAR */
        .sidebar {
            width: 220px;
            flex-shrink: 0;
            background: #1a3a2a;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem 1.5rem;
            position: relative;
            overflow: hidden;
        }

        .sidebar::before {
            content: '';
            position: absolute;
            top: -60px;
            left: -60px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.04);
        }

        .sidebar::after {
            content: '';
            position: absolute;
            bottom: -40px;
            right: -40px;
            width: 160px;
            height: 160px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.04);
        }

        .sidebar-icon {
            font-size: 48px;
            color: #7ec8a0;
            margin-bottom: 1.5rem;
            position: relative;
            z-index: 1;
        }

        .sidebar-title {
            font-family: 'Playfair Display', serif;
            font-size: 15px;
            font-weight: 600;
            color: #ffffff;
            text-align: center;
            line-height: 1.5;
            position: relative;
            z-index: 1;
        }

        .sidebar-sub {
            font-size: 11px;
            color: #7ec8a0;
            text-align: center;
            margin-top: 0.5rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            position: relative;
            z-index: 1;
        }

        .dots {
            display: flex;
            gap: 6px;
            margin-top: 2rem;
            position: relative;
            z-index: 1;
        }

        .dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: rgba(126, 200, 160, 0.35);
        }

        .dot.active {
            background: #7ec8a0;
        }

        /* MAIN */
        .main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2.5rem 2rem;
            background: #ffffff;
        }

        .card {
            width: 100%;
            max-width: 300px;
        }

        .greeting {
            font-size: 11px;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: #7ec8a0;
            font-weight: 500;
            margin-bottom: 0.4rem;
        }

        .headline {
            font-family: 'Playfair Display', serif;
            font-size: 22px;
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 0.35rem;
        }

        .subline {
            font-size: 13px;
            color: #888;
            margin-bottom: 1.75rem;
        }

        .field {
            margin-bottom: 1.1rem;
        }

        .field label {
            display: block;
            font-size: 11px;
            font-weight: 500;
            letter-spacing: 0.06em;
            color: #555;
            text-transform: uppercase;
            margin-bottom: 0.4rem;
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap i.icon-left {
            position: absolute;
            left: 11px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 16px;
            color: #aaa;
            pointer-events: none;
        }

        .input-wrap input {
            width: 100%;
            height: 42px;
            padding: 0 40px 0 36px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            color: #1a1a1a;
            background: #f9faf9;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .input-wrap input:focus {
            border-color: #1a3a2a;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(126, 200, 160, 0.2);
        }

        .toggle-pw {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            font-size: 16px;
            color: #aaa;
            padding: 0;
            display: flex;
            align-items: center;
        }

        .forgot {
            text-align: right;
            margin-top: 5px;
        }

        .forgot a {
            font-size: 12px;
            color: #2e7d52;
            text-decoration: none;
            font-weight: 500;
        }

        .forgot a:hover {
            text-decoration: underline;
        }

        .btn-login {
            width: 100%;
            height: 44px;
            background: #1a3a2a;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0.04em;
            cursor: pointer;
            margin-top: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: background 0.2s, transform 0.1s;
        }

        .btn-login:hover {
            background: #264d38;
        }

        .btn-login:active {
            transform: scale(0.98);
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 1.25rem 0 0;
        }

        .divider span {
            height: 1px;
            flex: 1;
            background: #e5e5e5;
        }

        .divider p {
            font-size: 11px;
            color: #aaa;
            white-space: nowrap;
        }

        .footer-note {
            text-align: center;
            margin-top: 1rem;
            font-size: 12px;
            color: #888;
        }

        .footer-note a {
            color: #2e7d52;
            font-weight: 500;
            text-decoration: none;
        }

        .footer-note a:hover {
            text-decoration: underline;
        }

        .error-msg {
            display: none;
            font-size: 12px;
            color: #c0392b;
            margin-top: 4px;
        }

        .input-wrap input.invalid {
            border-color: #c0392b;
            box-shadow: 0 0 0 3px rgba(192, 57, 43, 0.15);
        }

        /* Alert Error */
        .alert {
            width: 100%;
            border-radius: 10px;
            padding: 14px 16px;
            margin-bottom: 1rem;
            font-size: 13px;
            display: flex;
            align-items: flex-start;
            gap: 10px;
            animation: fadeIn 0.25s ease-in-out;
        }

        .alert-danger {
            background: #fff4f2;
            border: 1px solid #f3c6bf;
            color: #a93226;
            box-shadow: 0 4px 12px rgba(169, 50, 38, 0.08);
        }

        .alert-danger::before {
            content: '\26A0';
            font-size: 18px;
            line-height: 1;
            margin-top: 1px;
        }

        .alert ul {
            margin: 0;
            padding-left: 18px;
            width: 100%;
        }

        .alert li {
            line-height: 1.5;
            margin-bottom: 4px;
        }

        .alert li:last-child {
            margin-bottom: 0;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-6px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-icon"><i class="ti ti-building-store"></i></div>
            <div class="sidebar-title">Sistem Informasi Manajemen Toko Kelontong</div>
            <div class="sidebar-sub">SIMTOKO</div>
            <div class="dots">
                <div class="dot active"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
        </div>

        <!-- Main Form -->
        <div class="main">
            <div class="card">
                <!-- Tombol Back -->
                <a href="{{ url('/') }}" class="btn-back">
                    <i class="ti ti-arrow-left"></i>
                    Kembali
                </a>
                <div class="greeting">Selamat datang</div>
                <div class="headline">Masuk ke Akun</div>
                <div class="subline">Masukkan kredensial Anda untuk melanjutkan</div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('login.proses') }}" method="post" id="login-form">
                    @csrf

                    <div class="field">
                        <label for="username">Username</label>
                        <div class="input-wrap">
                            <i class="ti ti-user icon-left"></i>
                            <input type="text" id="username" name="username" placeholder="Masukkan username"
                                value="{{ old('username') }}" autocomplete="username" />
                        </div>
                        <span class="error-msg" id="error-username"></span>
                    </div>

                    <div class="field">
                        <label for="password">Password</label>
                        <div class="input-wrap">
                            <i class="ti ti-lock icon-left"></i>
                            <input type="password" id="password" name="password" placeholder="Masukkan password"
                                autocomplete="current-password" />
                            <button class="toggle-pw" id="toggle-pw" type="button"
                                aria-label="Tampilkan/sembunyikan password">
                                <i class="ti ti-eye" id="eye-icon"></i>
                            </button>
                        </div>
                        <span class="error-msg" id="error-password"></span>
                        <div class="forgot"><a href="#">Lupa password?</a></div>
                    </div>

                    <button class="btn-login" type="submit">
                        <i class="ti ti-login"></i>
                        Masuk
                    </button>
                </form>

                <div class="divider">
                    <span></span>
                    <p>Butuh bantuan?</p>
                    <span></span>
                </div>

                <div class="footer-note">Hubungi <a href="#">Administrator</a> jika ada masalah</div>
            </div>
        </div>
    </div>

    <script>
        // Toggle show/hide password
        document.getElementById('toggle-pw').addEventListener('click', function() {
            const input = document.getElementById('password');
            const icon = document.getElementById('eye-icon');
            if (input.type === 'password') {
                input.type = 'text';
                icon.className = 'ti ti-eye-off';
            } else {
                input.type = 'password';
                icon.className = 'ti ti-eye';
            }
        });

        // Fungsi tampilkan/sembunyikan error
        function showError(id, msg) {
            const el = document.getElementById(id);
            el.textContent = msg;
            el.style.display = msg ? 'block' : 'none';
        }

        function clearError(id) {
            showError(id, '');
        }

        // Validasi realtime username
        document.getElementById('username').addEventListener('input', function() {
            const val = this.value.trim();
            if (!val) {
                showError('error-username', 'Username tidak boleh kosong.');
            } else if (val.length < 3) {
                showError('error-username', 'Username minimal 3 karakter.');
            } else {
                clearError('error-username');
            }
        });

        // Validasi realtime password
        document.getElementById('password').addEventListener('input', function() {
            const val = this.value;
            if (!val) {
                showError('error-password', 'Password tidak boleh kosong.');
            } else if (val.length < 6) {
                showError('error-password', 'Password minimal 6 karakter.');
            } else {
                clearError('error-password');
            }
        });

        // Validasi saat submit
        document.getElementById('login-form').addEventListener('submit', function(e) {
            const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value;
            let valid = true;

            if (!username) {
                showError('error-username', 'Username tidak boleh kosong.');
                valid = false;
            } else if (username.length < 3) {
                showError('error-username', 'Username minimal 3 karakter.');
                valid = false;
            }

            if (!password) {
                showError('error-password', 'Password tidak boleh kosong.');
                valid = false;
            } else if (password.length < 6) {
                showError('error-password', 'Password minimal 6 karakter.');
                valid = false;
            }

            if (!valid) e.preventDefault();
        });
    </script>

</body>

</html>
