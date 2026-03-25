<footer class="site-footer">
    <div class="container">
        <div class="row align-items-center gy-3">
            <div class="col-md-4">
                <div class="d-flex align-items-center gap-2">
                    <img src="{{ asset('images/logo.png') }}" alt="" height="28"
                        style="filter: brightness(0) invert(1); opacity: 0.85;">
                    <span class="footer-brand-name">When and What<span class="footer-brand-tld">.me</span></span>
                </div>
            </div>
            <div class="col-md-4 text-md-center">
                <nav class="d-flex flex-wrap gap-3 justify-content-md-center">
                    <a href="{{ url('/') }}">Home</a>
                    <a href="{{ url('/features') }}">Features</a>
                    <a href="{{ url('/faq') }}">FAQ &amp; Tips</a>
                    <a href="{{ url('/contact') }}">Contact</a>
                    <a href="{{ url('/privacy') }}">Privacy</a>
                    <a href="{{ url('/terms') }}">Terms</a>
                </nav>
            </div>
            <div class="col-md-4 text-md-end">
                <div class="d-flex gap-3 justify-content-md-end align-items-center mb-1">
                    <a href="https://phpc.social/@whenandwhat" target="_blank" rel="noopener me" aria-label="Mastodon" class="footer-social-link">
                        <i class="fa-brands fa-mastodon"></i>
                    </a>
                    <a href="https://bsky.app/profile/whenandwhat.me" target="_blank" rel="noopener" aria-label="Bluesky" class="footer-social-link">
                        <i class="fa-brands fa-bluesky"></i>
                    </a>
                </div>
                <span>&copy; {{ date('Y') }} When and What, LLC. All rights reserved.</span>
            </div>
        </div>
    </div>
</footer>
