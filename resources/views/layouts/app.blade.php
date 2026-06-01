<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'EDUVA')</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            color: #0F172A;
            background: #F8FAFC;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button, .btn {
            font: inherit;
        }

        .page-container {
            width: min(100%, 1200px);
            margin: 0 auto;
            padding: 0 24px;
        }

        .site-header {
            position: sticky;
            top: 0;
            z-index: 50;
            background: #ffffff;
            border-bottom: 1px solid #E2E8F0;
            backdrop-filter: blur(10px);
        }

        .header-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            min-height: 80px;
        }

        .brand-logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-logo svg {
            width: 40px;
            height: 40px;
        }

        .brand-title {
            font-size: 1.35rem;
            font-weight: 800;
            color: #1E3A8A;
        }

        .brand-title span {
            color: #2563EB;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 32px;
            flex-wrap: wrap;
        }

        .nav-links a {
            color: #334155;
            font-weight: 600;
            transition: color 0.2s ease;
        }

        .nav-links a:hover {
            color: #2563EB;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 9999px;
            font-weight: 700;
            transition: transform 0.2s ease, background 0.2s ease, color 0.2s ease;
        }

        .btn-primary {
            background: #2563EB;
            color: #ffffff;
            border: 1px solid transparent;
            padding: 0.95rem 1.85rem;
        }

        .btn-primary:hover {
            background: #1D4ED8;
            transform: translateY(-1px);
        }

        .btn-secondary {
            background: #ffffff;
            color: #1E3A8A;
            border: 1px solid #CBD5E1;
            padding: 0.95rem 1.85rem;
        }

        .btn-secondary:hover {
            background: #EFF6FF;
        }

        .hero-section {
            position: relative;
            overflow: hidden;
            padding: 100px 0 90px;
            background: linear-gradient(180deg, #1E40AF 0%, #2563EB 45%, #2563EB 100%);
        }

        .hero-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background: url("{{ asset('img/landingpage/Mask Group.png') }}") center/cover no-repeat;
            opacity: 0.28;
            filter: saturate(0.6) brightness(0.8);
        }

        .hero-section::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(15, 23, 42, 0.32), rgba(37, 99, 235, 0.28));
        }

        .grid {
            display: grid;
        }

        .grid-cols-1 {
            grid-template-columns: 1fr;
        }

        .gap-6 {
            gap: 24px;
        }

        .gap-12 {
            gap: 48px;
        }

        .items-center {
            align-items: center;
        }

        .hero-inner {
            position: relative;
            z-index: 2;
            display: grid;
            gap: 32px;
        }

        .hero-copy {
            max-width: 560px;
            padding: 1rem 0;
        }

        .hero-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: rgba(223, 232, 255, 0.25);
            color: #DBEAFE;
            font-size: 0.82rem;
            font-weight: 700;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            padding: 0.7rem 1rem;
            border-radius: 9999px;
            margin-bottom: 26px;
        }

        .hero-title {
            color: #FFFFFF;
            font-size: clamp(3.2rem, 4vw, 4.8rem);
            line-height: 0.94;
            font-weight: 800;
            margin-bottom: 28px;
        }

        .hero-text {
            max-width: 520px;
            color: rgba(255, 255, 255, 0.88);
            line-height: 1.9;
            font-size: 1rem;
            margin-bottom: 34px;
        }

        .hero-media {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .hero-card {
            width: 100%;
            max-width: 540px;
            border-radius: 38px;
            overflow: hidden;
            box-shadow: 0 28px 80px rgba(15, 23, 42, 0.22);
            border: 1px solid rgba(255, 255, 255, 0.15);
            background: #ffffff;
        }

        .hero-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .hero-badge {
            position: absolute;
            display: inline-flex;
            align-items: center;
            gap: 0.85rem;
            padding: 0.95rem 1rem;
            border-radius: 20px;
            background: #FFFFFF;
            box-shadow: 0 18px 36px rgba(15, 23, 42, 0.14);
            min-width: 170px;
            font-size: 0.95rem;
            font-weight: 700;
        }

        .badge-students {
            top: -8px;
            left: -8px;
        }

        .badge-review {
            top: 10px;
            right: -12px;
        }

        .badge-courses {
            bottom: 10px;
            right: -12px;
            background: #10B981;
            color: #ffffff;
        }

        .hero-badge .badge-icon,
        .hero-badge .badge-dot {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: #EFF6FF;
            color: #2563EB;
            font-size: 1rem;
        }

        .section-features,
        .section-about {
            padding: 80px 0;
        }

        .section-heading {
            display: flex;
            flex-direction: column;
            gap: 14px;
            text-align: center;
            margin-bottom: 44px;
        }

        .section-label {
            display: inline-flex;
            align-items: center;
            padding: 0.75rem 1rem;
            border-radius: 9999px;
            background: rgba(99, 102, 241, 0.12);
            color: #4338CA;
            font-size: 0.85rem;
            font-weight: 700;
            letter-spacing: 0.05em;
            margin-bottom: 16px;
        }

        .section-title {
            font-size: clamp(2rem, 3vw, 2.6rem);
            color: #0F172A;
            line-height: 1.05;
            font-weight: 800;
        }

        .section-sub {
            max-width: 680px;
            margin: 0 auto;
            color: #475569;
            font-size: 1rem;
            line-height: 1.8;
        }

        .features-grid {
            display: grid;
            gap: 24px;
        }

        .feature-card {
            background: #FFFFFF;
            border: 1px solid #E2E8F0;
            border-radius: 28px;
            padding: 32px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .feature-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(37, 99, 235, 0.12);
        }

        .feature-icon {
            width: 56px;
            height: 56px;
            display: grid;
            place-items: center;
            border-radius: 18px;
            background: #EFF6FF;
            margin-bottom: 22px;
            color:#2563EB;
        }

        .feature-card h3 {
            font-size: 1.05rem;
            margin-bottom: 14px;
            color: #0F172A;
        }

        .feature-card p {
            color: #475569;
            line-height: 1.75;
            font-size: 0.95rem;
        }

        .section-about {
            background: #FFFFFF;
        }

        .about-grid {
            display: grid;
            gap: 32px;
            align-items: center;
        }

        .about-media {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .about-image-card {
            position: relative;
            width: 100%;
            max-width: 560px;
            min-height: 420px;
            border-radius: 42px;
            overflow: hidden;
            background: #ffffff;
            box-shadow: 0 30px 80px rgba(15, 23, 42, 0.16);
            border: 1px solid rgba(148, 163, 184, 0.16);
        }

        .about-image-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .about-image-arrow {
            position: absolute;
            top: -24px;
            left: -22px;
            width: 110px;
            height: 100px;
            z-index: 2;
        }

        .about-image-star {
            position: absolute;
            bottom: -18px;
            right: 18px;
            width: 78px;
            height: 78px;
            border-radius: 26px;
            background: #FB7185;
            color: #ffffff;
            display: grid;
            place-items: center;
            font-size: 2rem;
            box-shadow: 0 25px 45px rgba(251, 113, 133, 0.24);
            z-index: 2;
        }

        .about-copy {
            max-width: 560px;
        }

        .about-copy h2 {
            margin: 18px 0 24px;
            font-size: clamp(2.2rem, 3vw, 2.8rem);
            line-height: 1.04;
            font-weight: 800;
            color: #0F172A;
        }

        .about-copy p {
            color: #475569;
            line-height: 1.85;
            margin-bottom: 26px;
        }

        .about-highlight {
            color: #0F172A;
            font-weight: 800;
            margin-bottom: 18px;
        }

        .about-list {
            list-style: none;
            padding: 0;
            margin: 0 0 34px;
            display: grid;
            gap: 16px;
        }

        .about-list li {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            color: #0F172A;
            font-weight: 600;
            line-height: 1.75;
        }

        .about-list svg {
            width: 26px;
            height: 26px;
            margin-top: 4px;
            color: #2563EB;
        }

        .about-actions {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 22px;
        }

        .about-info {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .info-number {
            font-size: 1.55rem;
            font-weight: 800;
            color: #0F172A;
        }

        .info-label {
            color: #64748B;
        }

        .footer {
            background: #1E293B;
            color: #CBD5E0;
            padding: 56px 0 32px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 1.8fr 1fr 1fr 1fr;
            gap: 36px;
            width: min(100%, 1100px);
            margin: 0 auto;
        }

        .footer-brand {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .footer-brand .brand-title {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            font-size: 1.3rem;
            font-weight: 800;
            color: #ffffff;
        }

        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
            display: grid;
            gap: 10px;
        }

        .footer-links a {
            color: #CBD5E0;
            font-size: 0.95rem;
        }

        .footer-links a:hover {
            color: #ffffff;
        }

        .footer-divider {
            border: none;
            border-top: 1px solid rgba(255, 255, 255, 0.12);
            margin: 40px auto 0;
            width: min(100%, 1100px);
        }

        .footer-text {
            text-align: center;
            color: #94A3B8;
            font-size: 0.95rem;
            margin-top: 16px;
        }

        /* ── signup & login grid: selalu 2 kolom di desktop ── */
        .signup-grid,
        .login-grid,
        .verify-grid {
            display: grid !important;
            grid-template-columns: 1fr 1fr !important;
            gap: 42px !important;
            align-items: stretch !important;
        }

        @media (max-width: 1024px) {
            .header-inner { flex-wrap: wrap; }
            .nav-links { gap: 18px; }
            .footer-grid { grid-template-columns: 1fr; }
            .hero-badge { position: static; width: auto; margin-top: 16px; }
        }

        @media (max-width: 768px) {
            .page-container { padding: 0 18px; }
            .header-inner { gap: 16px; }
            .nav-links { gap: 14px; }
            .hero-title { font-size: 2.8rem; }
            .hero-text { font-size: 0.98rem; }
            .hero-section { padding-top: 72px; }
            .about-grid { grid-template-columns: 1fr; }
            .about-top-card, .about-main-card { min-height: 220px; }
            .section-features, .section-about { padding: 60px 0; }
            .signup-grid,
            .login-grid,
            .verify-grid {
                grid-template-columns: 1fr !important;
            }
        }

        @media (min-width: 768px) {
            .md\:grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .md\:grid-cols-3 { grid-template-columns: repeat(3, minmax(0, 1fr)); }
        }
    </style>
</head>
<body>
    <header class="site-header">
        <div class="page-container header-inner">
            <a href="{{ route('home') }}" class="brand-logo">
                <svg viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="19" cy="19" r="19" fill="#2563EB" />
                    <path d="M10 26L19 12L28 26" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M13 22H25" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <circle cx="19" cy="10" r="2.5" fill="#60A5FA" />
                </svg>
                <span class="brand-title">EDU<span>VA</span></span>
            </a>

            <nav class="nav-links">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('assessment.index') }}">Assessment</a>
                <a href="#">Career Match</a>
                <a href="#">Learning Path</a>
            </nav>

            <div class="nav-actions">
                @auth
                    <form method="POST" action="{{ route('logout') }}" style="display: inline-flex;">
                        @csrf
                        <button type="submit" class="btn btn-secondary">Logout ({{ Auth::user()->username }})</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-secondary">Masuk</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Daftar</a>
                @endauth
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="footer-grid">
            <div class="footer-brand">
                <div class="brand-title">
                    <svg width="28" height="28" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="19" cy="19" r="19" fill="#2563EB" />
                        <path d="M10 26L19 12L28 26" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M13 22H25" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <circle cx="19" cy="10" r="2.5" fill="#60A5FA" />
                    </svg>
                    EDUVA
                </div>
                <p>Platform asesmen, karir match, dan modul pelatihan yang terintegrasi untuk siswa dan talenta vokasi.</p>
            </div>

            <div>
                <h4>Platform</h4>
                <ul class="footer-links">
                    <li><a href="#">Assessment</a></li>
                    <li><a href="#">Career Match</a></li>
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Learning Path</a></li>
                    <li><a href="#">Profile</a></li>
                </ul>
            </div>

            <div>
                <h4>Perusahaan</h4>
                <ul class="footer-links">
                    <li><a href="#">Tentang Kami</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Karir</a></li>
                    <li><a href="#">Kontak</a></li>
                </ul>
            </div>

            <div>
                <h4>Kontak</h4>
                <p>Jl Garuda no 15, Cilandak, Jakarta Selatan 175612</p>
                <p class="info-number">+625 2959 500</p>
                <p>eduvainfo@gmail.com</p>
            </div>
        </div>

        <hr class="footer-divider" />
        <p class="footer-text">© 2026 Eduva.com. All rights reserved.</p>
    </footer>
</body>
</html>