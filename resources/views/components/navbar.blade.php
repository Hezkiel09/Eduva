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
            <a href="{{ route('learning-path') ?? '#' }}">Learning Path</a>
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
