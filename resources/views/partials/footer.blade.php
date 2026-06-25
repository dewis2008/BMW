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
            <p>BMW specialist Norwich, BMW repairs Norwich, BMW diagnostics Norwich, BMW coding Norwich, MINI specialist Norwich and BMW performance builds.</p>
            <a class="button button-primary" href="{{ route('home') }}#contact">Request a Quote</a>
        </div>

        <nav class="footer-nav" aria-label="Footer navigation">
            <a href="{{ route('home') }}#services">Services</a>
            <a href="{{ route('home') }}#performance-builds">Performance Builds</a>
            <a href="{{ route('home') }}#gallery">Gallery</a>
            <a href="{{ route('home') }}#about">About</a>
            <a href="{{ route('home') }}#contact">Contact</a>
            <a href="https://www.facebook.com/AutoworksRS/" target="_blank" rel="noopener noreferrer">Facebook</a>
            <a href="https://www.instagram.com/rsautoworksltdnorwich" target="_blank" rel="noopener noreferrer">Instagram</a>
        </nav>

        <form class="quick-form" action="{{ route('contactMessages.store') }}" method="post" data-validate-form data-loading-label="Sending...">
            @csrf
            <h2>Quick enquiry</h2>

            @if(session('contact_success'))
                <div class="form-alert form-alert-success" role="status">{{ session('contact_success') }}</div>
            @endif

            @if($errors->contact->any())
                <div class="form-alert form-alert-error" role="alert">Please check the quick enquiry fields.</div>
            @endif

            <div class="honeypot" aria-hidden="true">
                <label for="contact-website">Website</label>
                <input id="contact-website" type="text" name="website" value="" tabindex="-1" autocomplete="off">
            </div>

            <div class="field">
                <label for="quick_name">Name</label>
                <input id="quick_name" name="name" type="text" value="{{ old('name') }}" maxlength="100" data-required>
                @error('name', 'contact')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label for="email_or_phone">Phone or email</label>
                <input id="email_or_phone" name="email_or_phone" type="text" value="{{ old('email_or_phone') }}" maxlength="150" data-required>
                @error('email_or_phone', 'contact')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label for="quick_message">Message</label>
                <textarea id="quick_message" name="message" rows="4" maxlength="1200" data-required data-min-length="10">{{ old('message') }}</textarea>
                @error('message', 'contact')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            <button class="button button-secondary form-submit" type="submit">Send Quick Enquiry</button>
        </form>
    </div>

    <div class="footer-bottom section-shell">
        <p>&copy; {{ date('Y') }} R&S Auto Works. All rights reserved.</p>
    </div>
</footer>
