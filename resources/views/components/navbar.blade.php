<header class="site-header">
    <div class="page-container header-inner">
        <a href="{{ route('home') }}" class="brand-logo">
            <img src="{{ asset('img/assetlogin/eduva.png') }}" alt="EDUVA" style="height: 45px; width: auto;">
        </a>

        <nav class="nav-links">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('assessment.index') }}">Assessment</a>
            <a href="#">Opportunity Hub</a>
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
