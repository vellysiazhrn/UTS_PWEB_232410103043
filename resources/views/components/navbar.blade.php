<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center">
            <img src="{{ asset('assets/logo.jpg') }}" alt="CiaLoops Logo" height="40" class="logo-img me-2">
            CiaLoops
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="/dashboard">
                        <i class="fas fa-home me-1"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('pengelolaan') ? 'active' : '' }}" href="/pengelolaan">
                        <i class="fas fa-heart me-1"></i> Projects
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('profile') ? 'active' : '' }}" href="/profile">
                        <i class="fas fa-user me-1"></i> Profile
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script src="{{ asset('js/app.js') }}"></script>
