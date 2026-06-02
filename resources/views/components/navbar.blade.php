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
                <div class="user-profile-dropdown" id="userNavbarDropdown">
                    <button class="user-profile-trigger" id="userDropdownTrigger" aria-label="Menu Pengguna">
                        <img src="{{ Auth::user()->avatar_url }}" alt="{{ Auth::user()->username }}" class="user-navbar-avatar">
                    </button>
                    <div class="nav-dropdown-menu" id="userDropdownMenu">
                        <div class="nav-dropdown-header">
                            <span class="nav-dropdown-username">{{ Auth::user()->username }}</span>
                            <span class="nav-dropdown-email">{{ Auth::user()->email ?? 'Belum ada email' }}</span>
                        </div>
                        <a href="{{ route('profile.show') }}" class="nav-dropdown-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                            Profil Saya
                        </a>
                        <div class="nav-dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}" style="margin: 0; width: 100%;">
                            @csrf
                            <button type="submit" class="nav-dropdown-item logout-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                Keluar
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="btn btn-secondary">Masuk</a>
                <a href="{{ route('register') }}" class="btn btn-primary">Daftar</a>
            @endauth
        </div>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const trigger = document.getElementById('userDropdownTrigger');
        const menu = document.getElementById('userDropdownMenu');

        if (trigger && menu) {
            trigger.addEventListener('click', (e) => {
                e.stopPropagation();
                menu.classList.toggle('active');
            });

            document.addEventListener('click', (e) => {
                if (!menu.contains(e.target) && !trigger.contains(e.target)) {
                    menu.classList.remove('active');
                }
            });
        }
    });
</script>

