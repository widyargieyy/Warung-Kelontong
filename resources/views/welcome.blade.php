<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SIMTOKO — Sistem Informasi Manajemen Toko Kelontong</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,700;1,500&family=DM+Sans:wght@300;400;500&display=swap"
        rel="stylesheet" />
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --green-dark: #1a3a2a;
            --green-mid: #2e6b47;
            --green-light: #7ec8a0;
            --green-pale: #e8f5ee;
            --cream: #faf8f3;
            --text-dark: #1a1a1a;
            --text-mid: #555;
            --text-light: #999;
            --border: #e0e0d8;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--cream);
            color: var(--text-dark);
            overflow-x: hidden;
        }

        /* ─── NAVBAR ─── */
        nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 4rem;
            background: rgba(250, 248, 243, 0.92);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border);
        }

        .nav-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .nav-logo-icon {
            width: 36px;
            height: 36px;
            background: var(--green-dark);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--green-light);
            font-size: 18px;
        }

        .nav-logo-text {
            font-family: 'Playfair Display', serif;
            font-size: 18px;
            font-weight: 700;
            color: var(--green-dark);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 2rem;
            list-style: none;
        }

        .nav-links a {
            font-size: 14px;
            color: var(--text-mid);
            text-decoration: none;
            font-weight: 400;
            transition: color 0.2s;
        }

        .nav-links a:hover {
            color: var(--green-dark);
        }

        .nav-cta {
            background: var(--green-dark);
            color: #fff !important;
            padding: 8px 20px;
            border-radius: 8px;
            font-weight: 500 !important;
            transition: background 0.2s !important;
        }

        .nav-cta:hover {
            background: var(--green-mid) !important;
            color: #fff !important;
        }

        /* ─── HERO ─── */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 8rem 4rem 5rem;
            position: relative;
            overflow: hidden;
        }

        .hero-bg {
            position: absolute;
            inset: 0;
            z-index: 0;
        }

        .hero-bg-circle1 {
            position: absolute;
            top: -120px;
            right: -120px;
            width: 600px;
            height: 600px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(126, 200, 160, 0.18) 0%, transparent 70%);
        }

        .hero-bg-circle2 {
            position: absolute;
            bottom: -80px;
            left: -80px;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(26, 58, 42, 0.06) 0%, transparent 70%);
        }

        .hero-grid {
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(26, 58, 42, 0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(26, 58, 42, 0.04) 1px, transparent 1px);
            background-size: 48px 48px;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 620px;
            animation: fadeUp 0.8s ease both;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--green-pale);
            color: var(--green-mid);
            font-size: 12px;
            font-weight: 500;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            padding: 6px 14px;
            border-radius: 100px;
            border: 1px solid rgba(126, 200, 160, 0.4);
            margin-bottom: 1.5rem;
        }

        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(36px, 5vw, 58px);
            font-weight: 700;
            line-height: 1.15;
            color: var(--green-dark);
            margin-bottom: 1.25rem;
        }

        .hero-title em {
            font-style: italic;
            color: var(--green-mid);
        }

        .hero-desc {
            font-size: 16px;
            color: var(--text-mid);
            line-height: 1.75;
            margin-bottom: 2.5rem;
            max-width: 480px;
        }

        .hero-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--green-dark);
            color: #fff;
            padding: 14px 28px;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 500;
            text-decoration: none;
            transition: background 0.2s, transform 0.1s;
        }

        .btn-primary:hover {
            background: var(--green-mid);
            transform: translateY(-1px);
        }

        .btn-secondary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: transparent;
            color: var(--green-dark);
            padding: 14px 28px;
            border-radius: 10px;
            border: 1px solid var(--border);
            font-size: 15px;
            font-weight: 500;
            text-decoration: none;
            transition: background 0.2s;
        }

        .btn-secondary:hover {
            background: var(--green-pale);
        }

        .hero-visual {
            position: absolute;
            right: 4rem;
            top: 50%;
            transform: translateY(-50%);
            z-index: 1;
            animation: fadeUp 1s 0.2s ease both;
        }

        .hero-card {
            background: #fff;
            border-radius: 16px;
            border: 1px solid var(--border);
            padding: 1.5rem;
            width: 280px;
            box-shadow: 0 20px 60px rgba(26, 58, 42, 0.1);
        }

        .hero-card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.25rem;
        }

        .hero-card-title {
            font-size: 12px;
            font-weight: 500;
            color: var(--text-light);
            text-transform: uppercase;
            letter-spacing: 0.06em;
        }

        .hero-card-badge {
            background: var(--green-pale);
            color: var(--green-mid);
            font-size: 11px;
            font-weight: 500;
            padding: 3px 10px;
            border-radius: 100px;
        }

        .hero-stat {
            margin-bottom: 1rem;
        }

        .hero-stat-label {
            font-size: 12px;
            color: var(--text-light);
            margin-bottom: 4px;
        }

        .hero-stat-value {
            font-family: 'Playfair Display', serif;
            font-size: 26px;
            font-weight: 700;
            color: var(--green-dark);
        }

        .hero-stat-value span {
            font-size: 13px;
            color: var(--green-mid);
            font-family: 'DM Sans', sans-serif;
            margin-left: 4px;
        }

        .hero-bar-wrap {
            margin-top: 1.25rem;
        }

        .hero-bar-label {
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            color: var(--text-mid);
            margin-bottom: 5px;
        }

        .hero-bar {
            height: 6px;
            background: var(--green-pale);
            border-radius: 100px;
            overflow: hidden;
            margin-bottom: 8px;
        }

        .hero-bar-fill {
            height: 100%;
            background: var(--green-mid);
            border-radius: 100px;
            animation: barGrow 1.5s ease both;
            animation-delay: 0.8s;
            width: 0;
        }

        .hero-card2 {
            position: absolute;
            bottom: -60px;
            left: -80px;
            background: #fff;
            border-radius: 12px;
            border: 1px solid var(--border);
            padding: 1rem 1.25rem;
            width: 190px;
            box-shadow: 0 12px 40px rgba(26, 58, 42, 0.08);
        }

        .hero-card2-row {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .hero-card2-icon {
            width: 36px;
            height: 36px;
            background: var(--green-pale);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--green-mid);
            font-size: 18px;
            flex-shrink: 0;
        }

        .hero-card2-text {
            font-size: 12px;
            color: var(--text-mid);
        }

        .hero-card2-num {
            font-size: 18px;
            font-weight: 700;
            color: var(--green-dark);
        }

        /* ─── STATS BAR ─── */
        .stats-bar {
            background: var(--green-dark);
            padding: 2rem 4rem;
            display: flex;
            align-items: center;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 1.5rem;
        }

        .stat-item {
            text-align: center;
        }

        .stat-num {
            font-family: 'Playfair Display', serif;
            font-size: 32px;
            font-weight: 700;
            color: var(--green-light);
        }

        .stat-label {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.6);
            margin-top: 2px;
        }

        .stat-divider {
            width: 1px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
        }

        /* ─── FEATURES ─── */
        .section {
            padding: 6rem 4rem;
        }

        .section-label {
            font-size: 11px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--green-mid);
            font-weight: 500;
            margin-bottom: 0.75rem;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(28px, 3.5vw, 40px);
            font-weight: 700;
            color: var(--green-dark);
            margin-bottom: 1rem;
            max-width: 500px;
        }

        .section-desc {
            font-size: 15px;
            color: var(--text-mid);
            line-height: 1.75;
            max-width: 480px;
            margin-bottom: 3rem;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 1.5rem;
        }

        .feature-card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 1.75rem;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .feature-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 40px rgba(26, 58, 42, 0.08);
        }

        .feature-icon {
            width: 48px;
            height: 48px;
            background: var(--green-pale);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--green-mid);
            font-size: 22px;
            margin-bottom: 1.25rem;
        }

        .feature-title {
            font-size: 16px;
            font-weight: 500;
            color: var(--green-dark);
            margin-bottom: 0.5rem;
        }

        .feature-desc {
            font-size: 14px;
            color: var(--text-mid);
            line-height: 1.65;
        }

        /* ─── HOW IT WORKS ─── */
        .how-section {
            background: var(--green-pale);
            padding: 6rem 4rem;
        }

        .steps-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .step-item {
            text-align: center;
            position: relative;
        }

        .step-item:not(:last-child)::after {
            content: '';
            position: absolute;
            top: 28px;
            right: -1rem;
            width: 2rem;
            height: 2px;
            background: rgba(126, 200, 160, 0.5);
        }

        .step-num {
            width: 56px;
            height: 56px;
            background: var(--green-dark);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            font-weight: 700;
            color: var(--green-light);
            margin: 0 auto 1rem;
        }

        .step-title {
            font-size: 15px;
            font-weight: 500;
            color: var(--green-dark);
            margin-bottom: 0.5rem;
        }

        .step-desc {
            font-size: 13px;
            color: var(--text-mid);
            line-height: 1.65;
        }

        /* ─── TESTIMONIAL ─── */
        .testimonials {
            padding: 6rem 4rem;
        }

        .testi-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-top: 3rem;
        }

        .testi-card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 1.75rem;
        }

        .testi-stars {
            display: flex;
            gap: 3px;
            margin-bottom: 1rem;
            color: #f5a623;
            font-size: 14px;
        }

        .testi-text {
            font-size: 14px;
            color: var(--text-mid);
            line-height: 1.7;
            margin-bottom: 1.5rem;
            font-style: italic;
        }

        .testi-author {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .testi-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: var(--green-pale);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 500;
            color: var(--green-mid);
            flex-shrink: 0;
        }

        .testi-name {
            font-size: 14px;
            font-weight: 500;
            color: var(--green-dark);
        }

        .testi-role {
            font-size: 12px;
            color: var(--text-light);
        }

        /* ─── CTA ─── */
        .cta-section {
            background: var(--green-dark);
            padding: 6rem 4rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            top: -100px;
            left: 50%;
            transform: translateX(-50%);
            width: 600px;
            height: 600px;
            border-radius: 50%;
            background: rgba(126, 200, 160, 0.06);
            pointer-events: none;
        }

        .cta-label {
            font-size: 11px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--green-light);
            font-weight: 500;
            margin-bottom: 1rem;
        }

        .cta-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(28px, 4vw, 44px);
            font-weight: 700;
            color: #fff;
            margin-bottom: 1rem;
            position: relative;
        }

        .cta-desc {
            font-size: 15px;
            color: rgba(255, 255, 255, 0.6);
            margin-bottom: 2.5rem;
            max-width: 440px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.75;
        }

        .btn-cta {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--green-light);
            color: var(--green-dark);
            padding: 15px 32px;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 500;
            text-decoration: none;
            transition: background 0.2s, transform 0.1s;
        }

        .btn-cta:hover {
            background: #9dd9b6;
            transform: translateY(-1px);
        }

        /* ─── FOOTER ─── */
        footer {
            background: #111;
            padding: 3rem 4rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .footer-brand {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .footer-logo-icon {
            width: 32px;
            height: 32px;
            background: var(--green-dark);
            border-radius: 7px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--green-light);
            font-size: 16px;
        }

        .footer-brand-name {
            font-family: 'Playfair Display', serif;
            font-size: 16px;
            font-weight: 700;
            color: #fff;
        }

        .footer-copy {
            font-size: 13px;
            color: #555;
        }

        /* ─── ANIMATIONS ─── */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(24px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes barGrow {
            from {
                width: 0;
            }
        }

        .fade-up {
            opacity: 0;
            transform: translateY(24px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .fade-up.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav>
        <a href="#" class="nav-logo">
            <div class="nav-logo-icon"><i class="ti ti-building-store"></i></div>
            <span class="nav-logo-text">SIMTOKO</span>
        </a>
        <ul class="nav-links">
            <li><a href="#fitur">Fitur</a></li>
            <li><a href="#cara-kerja">Cara Kerja</a></li>
            <li><a href="#testimoni">Testimoni</a></li>
            <li><a href="{{ route('login') }}" class="nav-cta">Masuk</a></li>
        </ul>
    </nav>

    <!-- HERO -->
    <section class="hero">
        <div class="hero-bg">
            <div class="hero-bg-circle1"></div>
            <div class="hero-bg-circle2"></div>
            <div class="hero-grid"></div>
        </div>

        <div class="hero-content">
            <div class="hero-badge">
                <i class="ti ti-sparkles"></i>
                Sistem Manajemen Toko Modern
            </div>
            <h1 class="hero-title">
                Kelola Toko Kelontong<br />
                Anda dengan <em>Lebih Cerdas</em>
            </h1>
            <p class="hero-desc">
                SIMTOKO membantu pemilik toko kelontong mengelola stok, transaksi, dan laporan keuangan dalam satu
                platform yang mudah digunakan.
            </p>
            <div class="hero-actions">
                <a href="login.html" class="btn-primary">
                    <i class="ti ti-login"></i>
                    Mulai Sekarang
                </a>
                <a href="#fitur" class="btn-secondary">
                    <i class="ti ti-info-circle"></i>
                    Pelajari Fitur
                </a>
            </div>
        </div>

        <div class="hero-visual">
            <div style="position: relative;">
                <div class="hero-card">
                    <div class="hero-card-header">
                        <span class="hero-card-title">Ringkasan Hari Ini</span>
                        <span class="hero-card-badge">Live</span>
                    </div>
                    <div class="hero-stat">
                        <div class="hero-stat-label">Total Pendapatan</div>
                        <div class="hero-stat-value">Rp 2.4jt <span>↑ 12%</span></div>
                    </div>
                    <div class="hero-bar-wrap">
                        <div class="hero-bar-label"><span>Beras Premium</span><span>78%</span></div>
                        <div class="hero-bar">
                            <div class="hero-bar-fill" style="--w:78%" id="b1"></div>
                        </div>
                        <div class="hero-bar-label"><span>Minyak Goreng</span><span>55%</span></div>
                        <div class="hero-bar">
                            <div class="hero-bar-fill" style="--w:55%" id="b2"></div>
                        </div>
                        <div class="hero-bar-label"><span>Gula Pasir</span><span>40%</span></div>
                        <div class="hero-bar">
                            <div class="hero-bar-fill" style="--w:40%" id="b3"></div>
                        </div>
                    </div>
                </div>
                <div class="hero-card2">
                    <div class="hero-card2-row">
                        <div class="hero-card2-icon"><i class="ti ti-package"></i></div>
                        <div>
                            <div class="hero-card2-text">Stok Menipis</div>
                            <div class="hero-card2-num">8 Item</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- STATS BAR -->
    <div class="stats-bar">
        <div class="stat-item">
            <div class="stat-num">500+</div>
            <div class="stat-label">Toko Terdaftar</div>
        </div>
        <div class="stat-divider"></div>
        <div class="stat-item">
            <div class="stat-num">1.2jt+</div>
            <div class="stat-label">Transaksi Diproses</div>
        </div>
        <div class="stat-divider"></div>
        <div class="stat-item">
            <div class="stat-num">99.9%</div>
            <div class="stat-label">Uptime Sistem</div>
        </div>
        <div class="stat-divider"></div>
        <div class="stat-item">
            <div class="stat-num">4.9★</div>
            <div class="stat-label">Rating Pengguna</div>
        </div>
    </div>

    <!-- FEATURES -->
    <section class="section" id="fitur">
        <div class="fade-up">
            <div class="section-label">Fitur Unggulan</div>
            <h2 class="section-title">Semua yang Anda Butuhkan, dalam Satu Sistem</h2>
            <p class="section-desc">Dirancang khusus untuk kebutuhan toko kelontong — dari warung kecil hingga toko
                serba ada.</p>
        </div>
        <div class="features-grid fade-up">
            <div class="feature-card">
                <div class="feature-icon"><i class="ti ti-package"></i></div>
                <div class="feature-title">Manajemen Stok</div>
                <div class="feature-desc">Pantau stok secara real-time. Dapatkan notifikasi otomatis saat stok mendekati
                    batas minimum.</div>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="ti ti-receipt"></i></div>
                <div class="feature-title">Pencatatan Transaksi</div>
                <div class="feature-desc">Catat setiap penjualan dan pembelian dengan mudah. Dukung berbagai metode
                    pembayaran.</div>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="ti ti-chart-bar"></i></div>
                <div class="feature-title">Laporan Keuangan</div>
                <div class="feature-desc">Laporan harian, mingguan, dan bulanan secara otomatis. Analisis laba rugi
                    dalam sekejap.</div>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="ti ti-users"></i></div>
                <div class="feature-title">Manajemen Pelanggan</div>
                <div class="feature-desc">Simpan data pelanggan setia, kelola piutang, dan pantau riwayat transaksi.
                </div>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="ti ti-truck"></i></div>
                <div class="feature-title">Data Supplier</div>
                <div class="feature-desc">Kelola daftar supplier dan riwayat pembelian barang untuk memudahkan restock.
                </div>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="ti ti-shield-check"></i></div>
                <div class="feature-title">Keamanan Data</div>
                <div class="feature-desc">Data toko Anda terlindungi dengan sistem autentikasi dan hak akses pengguna
                    yang terstruktur.</div>
            </div>
        </div>
    </section>

    <!-- HOW IT WORKS -->
    <section class="how-section" id="cara-kerja">
        <div class="fade-up" style="text-align: center;">
            <div class="section-label">Cara Kerja</div>
            <h2 class="section-title" style="max-width: 100%; text-align: center;">Mudah Digunakan, Cepat Dipahami
            </h2>
        </div>
        <div class="steps-grid fade-up">
            <div class="step-item">
                <div class="step-num">1</div>
                <div class="step-title">Daftar Akun</div>
                <div class="step-desc">Hubungi administrator untuk mendapatkan akses masuk ke sistem SIMTOKO.</div>
            </div>
            <div class="step-item">
                <div class="step-num">2</div>
                <div class="step-title">Input Data Toko</div>
                <div class="step-desc">Masukkan data produk, harga, dan stok awal toko Anda ke dalam sistem.</div>
            </div>
            <div class="step-item">
                <div class="step-num">3</div>
                <div class="step-title">Mulai Transaksi</div>
                <div class="step-desc">Catat penjualan dan pembelian setiap hari secara mudah dan cepat.</div>
            </div>
            <div class="step-item">
                <div class="step-num">4</div>
                <div class="step-title">Pantau Laporan</div>
                <div class="step-desc">Lihat laporan dan analisis keuangan toko Anda kapan saja dan di mana saja.</div>
            </div>
        </div>
    </section>

    <!-- TESTIMONIALS -->
    <section class="testimonials" id="testimoni">
        <div class="fade-up">
            <div class="section-label">Testimoni</div>
            <h2 class="section-title">Dipercaya Ratusan Pemilik Toko</h2>
        </div>
        <div class="testi-grid fade-up">
            <div class="testi-card">
                <div class="testi-stars">
                    <i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i
                        class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i
                        class="ti ti-star-filled"></i>
                </div>
                <p class="testi-text">"Sejak pakai SIMTOKO, stok barang saya tidak pernah habis mendadak lagi.
                    Notifikasi stok tipis sangat membantu banget!"</p>
                <div class="testi-author">
                    <div class="testi-avatar">BW</div>
                    <div>
                        <div class="testi-name">Budi Wahyono</div>
                        <div class="testi-role">Pemilik Toko Makmur, Surabaya</div>
                    </div>
                </div>
            </div>
            <div class="testi-card">
                <div class="testi-stars">
                    <i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i
                        class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i
                        class="ti ti-star-filled"></i>
                </div>
                <p class="testi-text">"Laporan keuangan sekarang sudah otomatis. Saya tidak perlu lagi hitung manual di
                    buku tulis. Hemat waktu sekali!"</p>
                <div class="testi-author">
                    <div class="testi-avatar">SR</div>
                    <div>
                        <div class="testi-name">Siti Rahayu</div>
                        <div class="testi-role">Pemilik Warung Berkah, Malang</div>
                    </div>
                </div>
            </div>
            <div class="testi-card">
                <div class="testi-stars">
                    <i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i
                        class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i
                        class="ti ti-star-half-filled"></i>
                </div>
                <p class="testi-text">"Tampilanya mudah dimengerti bahkan oleh karyawan baru. Pelatihan hanya butuh
                    satu hari langsung bisa pakai."</p>
                <div class="testi-author">
                    <div class="testi-avatar">AH</div>
                    <div>
                        <div class="testi-name">Ahmad Hidayat</div>
                        <div class="testi-role">Pemilik Toko Sejahtera, Gresik</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="cta-section">
        <div class="cta-label">Siap Memulai?</div>
        <h2 class="cta-title">Tingkatkan Efisiensi Toko Anda Sekarang</h2>
        <p class="cta-desc">Bergabung bersama ratusan pemilik toko yang sudah merasakan kemudahan SIMTOKO.</p>
        <a href="login.html" class="btn-cta">
            <i class="ti ti-login"></i>
            Masuk ke Sistem
        </a>
    </section>

    <!-- FOOTER -->
    <footer>
        <div class="footer-brand">
            <div class="footer-logo-icon"><i class="ti ti-building-store"></i></div>
            <span class="footer-brand-name">SIMTOKO</span>
        </div>
        <div class="footer-copy">© 2025 Sistem Informasi Manajemen Toko Kelontong. Semua hak dilindungi.</div>
    </footer>

    <script>
        // Scroll animation
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(e => {
                if (e.isIntersecting) {
                    e.target.classList.add('visible');
                }
            });
        }, {
            threshold: 0.15
        });

        document.querySelectorAll('.fade-up').forEach(el => observer.observe(el));

        // Animate progress bars
        setTimeout(() => {
            document.getElementById('b1').style.width = '78%';
            document.getElementById('b2').style.width = '55%';
            document.getElementById('b3').style.width = '40%';
        }, 800);
    </script>

</body>

</html>
