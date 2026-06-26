<section class="hero" id="home" aria-labelledby="hero-heading">
    <picture>
        <source
            type="image/webp"
            srcset="{{ asset('images/work/rs-drift-hero-960.webp') }} 960w, {{ asset('images/work/rs-drift-hero-1440.webp') }} 1440w, {{ asset('images/work/rs-drift-hero-2048.webp') }} 2048w"
            sizes="100vw"
        >
        <img
            class="hero-image"
            src="{{ asset('images/work/rs-drift-hero.jpg') }}"
            width="2048"
            height="1366"
            alt="R&S Auto Works BMW drift car on track"
            loading="eager"
            decoding="async"
            fetchpriority="high"
        >
    </picture>
    <div class="hero-overlay"></div>
    <div class="hero-inner section-shell">
        <p class="eyebrow">Norwich BMW and MINI specialist workshop</p>
        <h1 id="hero-heading">BMW & MINI Specialists in Norwich</h1>
        <p class="hero-copy">Expert diagnostics, repairs, coding, engine rebuilds, 8HP swaps, turbo builds, drift builds and custom BMW performance projects.</p>

        <div class="hero-actions">
            <a class="button button-primary" href="#contact">Request a Quote</a>
            <a class="button button-secondary" href="#gallery">View Our Work</a>
        </div>
    </div>
</section>
