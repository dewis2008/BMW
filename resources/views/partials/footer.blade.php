<footer class="site-footer">
    <div class="section-shell footer-layout">
        <div class="footer-brand">
            <a class="brand" href="{{ route('home') }}">
                <img src="{{ asset('images/work/rs-logo.jpg') }}" alt="" width="48" height="48">
                <span>
                    <strong>R&S Auto Works</strong>
                    <small>BMW & MINI Specialists</small>
                </span>
            </a>
            <p>BMW and MINI specialist workshop in Norwich, UK.</p>
        </div>

        <nav class="footer-nav" aria-label="Footer navigation">
            <span>Explore</span>
            <a href="{{ route('home') }}#services">Services</a>
            <a href="{{ route('home') }}#performance-builds">Performance Builds</a>
            <a href="{{ route('home') }}#gallery">Gallery</a>
            <a href="{{ route('home') }}#about">About</a>
            <a href="{{ route('home') }}#contact">Contact</a>
        </nav>

        <nav class="footer-nav footer-social" aria-label="Social links">
            <span>Follow</span>
            <div class="footer-social-links">
                <a class="footer-social-link" href="https://www.facebook.com/AutoworksRS/" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                    <img src="{{ asset('images/work/facebook-round-color-icon.png') }}" alt="" width="28" height="28">
                </a>
                <a class="footer-social-link" href="https://www.instagram.com/rsautoworksltdnorwich" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                    <img src="{{ asset('images/work/ig-instagram-icon.png') }}" alt="" width="28" height="28">
                </a>
            </div>
        </nav>
    </div>

    <div class="footer-bottom section-shell">
        <p>&copy; {{ date('Y') }} R&S Auto Works. All rights reserved.</p>
    </div>
</footer>
