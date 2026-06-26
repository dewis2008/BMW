<footer class="site-footer">
    <div class="section-shell footer-layout">
        <div class="footer-brand">
            <a class="brand" href="{{ route('home') }}" aria-label="R&S Auto Works home">
                <img src="{{ asset('images/work/rs-logo.jpg') }}" alt="" width="48" height="48">
                <span>
                    <strong>R&S Auto Works</strong>
                    <small>BMW & MINI Specialists</small>
                </span>
            </a>
            <p>BMW and MINI specialist workshop in Norwich, UK.</p>
            <a class="footer-cta" href="{{ route('home') }}#contact">Request a Quote</a>
        </div>

        <section class="footer-panel footer-visit" aria-labelledby="footer-visit-heading">
            <h2 id="footer-visit-heading">Visit & hours</h2>
            <div class="footer-visit-grid">
                <div>
                    <span>Workshop</span>
                    <address class="footer-address">
                        7 Auster Cl,<br>
                        Norwich, NR6 6BD
                    </address>
                    <a href="https://www.google.com/maps/search/?api=1&amp;query=7%20Auster%20Cl%2C%20Norwich%2C%20United%20Kingdom%2C%20NR6%206BD" target="_blank" rel="noopener">Open in Google Maps</a>
                </div>
                <div>
                    <span>Opening hours</span>
                    <dl class="footer-hours">
                        <div>
                            <dt>Mon-Fri</dt>
                            <dd><time datetime="08:30">08:30</time>-<time datetime="18:00">18:00</time></dd>
                        </div>
                        <div>
                            <dt>Weekend</dt>
                            <dd>Closed</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </section>

        <div class="footer-links-panel">
            <nav class="footer-nav" aria-label="Footer navigation">
                <span>Explore</span>
                <a href="{{ route('home') }}#services">Services</a>
                <a href="{{ route('home') }}#performance-builds">Performance Builds</a>
                <a href="{{ route('home') }}#gallery">Gallery</a>
                <a href="{{ route('home') }}#about">About</a>
                <a href="{{ route('home') }}#contact">Contact</a>
            </nav>

            <div class="footer-social" aria-label="Social links">
                <span>Follow</span>
                <div class="footer-social-links">
                    <a class="footer-social-link" href="https://www.facebook.com/AutoworksRS/" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                        <img src="{{ asset('images/work/facebook-round-color-icon.png') }}" alt="" width="28" height="28">
                    </a>
                    <a class="footer-social-link" href="https://www.instagram.com/rsautoworksltdnorwich" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                        <img src="{{ asset('images/work/ig-instagram-icon.png') }}" alt="" width="28" height="28">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom section-shell">
        <p>&copy; {{ date('Y') }} R&S Auto Works. All rights reserved.</p>
        <p>Diagnostics, repairs, coding, engine work and BMW performance builds.</p>
    </div>
</footer>
