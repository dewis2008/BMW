<header class="site-header" data-site-header>
    <div class="header-inner">
        <a class="brand" href="{{ route('home') }}" aria-label="R&S Auto Works home">
            <img src="{{ asset('images/work/rs-logo.jpg') }}" alt="" width="48" height="48">
            <span>
                <strong>R&S Auto Works</strong>
                <small>BMW & MINI Specialists</small>
            </span>
        </a>

        <button class="menu-toggle" type="button" aria-controls="primary-navigation" aria-expanded="false" data-menu-toggle>
            <span class="sr-only">Toggle navigation</span>
            <span></span>
            <span></span>
            <span></span>
        </button>

        <nav class="primary-nav" id="primary-navigation" data-mobile-menu aria-label="Primary navigation">
            <a href="{{ route('home') }}#home">Home</a>
            <a href="{{ route('home') }}#services">Services</a>
            <a href="{{ route('home') }}#performance-builds">Performance Builds</a>
            <a href="{{ route('home') }}#gallery">Gallery</a>
            <a href="{{ route('home') }}#about">About</a>
            <a href="{{ route('home') }}#contact">Contact</a>
            <a class="button button-small button-primary" href="{{ route('home') }}#contact">Request a Quote</a>
        </nav>
    </div>
</header>
