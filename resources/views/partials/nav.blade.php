<nav class="navbar navbar-expand-md sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/logo.png') }}" alt="" height="36">
            <span class="navbar-brand-name">When and What<span class="navbar-brand-tld">.me</span></span>
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
            aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto align-items-md-center gap-md-1 mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('features') ? 'active' : '' }}"
                        href="{{ url('/features') }}">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('faq') ? 'active' : '' }}" href="{{ url('/faq') }}">FAQ &amp;
                        Tips</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('pricing') ? 'active' : '' }}"
                        href="{{ url('/pricing') }}">Pricing</a>
                </li>
                <li class="nav-item ms-md-2">
                    <a class="btn btn-cta" href="https://whenandwhat.app" target="_blank" rel="noopener">
                        Open App <i class="fa-solid fa-arrow-up-right-from-square ms-1"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
