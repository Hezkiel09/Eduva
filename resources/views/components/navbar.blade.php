<header class="site-header">
    <div class="page-container header-inner">
        <a href="{{ route('home') }}" class="brand-logo" style="margin-left: -15px;">
            <img src="{{ asset('img/asset_login/logo eduva.png') }}" alt="EDUVA" style="height: 100px; width: auto; object-fit: contain; margin: -25px 0;">
        </a>

        <nav class="nav-links">
            <a href="{{ route('home') }}">Beranda</a>
            <a href="{{ route('assessment.index') }}">Asesmen</a>
            <a href="{{ route('job-opportunity') }}">Peluang Karir</a>
            <a href="{{ route('learning-path') ?? '#' }}">Jalur Belajar</a>
        </nav>

        <div class="nav-actions">
            @auth
                <form method="POST" action="{{ route('logout') }}" style="display: inline-flex; align-items: center;" title="Logout ({{ Auth::user()->username }})">
                    @csrf
                    <button type="submit" style="background: none; border: none; cursor: pointer; padding: 0; color: #1E293B; display: flex; align-items: center; justify-content: center;">
                        <svg viewBox="0 0 24 24" width="34" height="34" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-secondary">Masuk</a>
                <a href="{{ route('register') }}" class="btn btn-primary">Daftar</a>
            @endauth
        </div>
    </div>
</header>
