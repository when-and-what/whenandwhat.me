<footer class="site-footer">
    <div class="container">
        <div class="row align-items-center gy-3">
            <div class="col-md-4">
                <div class="d-flex align-items-center gap-2">
                    <img src="{{ asset('images/logo.png') }}" alt="" height="28" style="filter: brightness(0) invert(1); opacity: 0.85;">
                    <span class="footer-brand-name">When and What<span class="footer-brand-tld">.me</span></span>
                </div>
            </div>
            <div class="col-md-4 text-md-center">
                <nav class="d-flex flex-wrap gap-3 justify-content-md-center">
                    <a href="{{ url('/') }}">Home</a>
                    <a href="{{ url('/features') }}">Features</a>
                    <a href="{{ url('/faq') }}">FAQ &amp; Tips</a>
                    <a href="{{ url('/privacy') }}">Privacy</a>
                    <a href="{{ url('/terms') }}">Terms</a>
                </nav>
            </div>
            <div class="col-md-4 text-md-end">
                <span>&copy; {{ date('Y') }} When and What. All rights reserved.</span>
            </div>
        </div>
    </div>
</footer>
