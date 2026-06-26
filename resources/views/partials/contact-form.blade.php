<section class="section contact-section" id="contact" aria-labelledby="contact-heading">
    <div class="section-shell contact-layout">
        <div class="contact-intro">
            <p class="eyebrow">Contact</p>
            <h2 id="contact-heading">Request a quote from R&S Auto Works.</h2>

            <div class="contact-map">
                <div class="contact-map-copy">
                    <span>Shop address</span>
                    <address>
                        7 Auster Cl,<br>
                        Norwich, United Kingdom,<br>
                        NR6 6BD
                    </address>
                    <a href="https://www.google.com/maps/search/?api=1&amp;query=7%20Auster%20Cl%2C%20Norwich%2C%20United%20Kingdom%2C%20NR6%206BD" target="_blank" rel="noopener">Open in Google Maps</a>
                </div>
                <iframe
                    class="contact-map-frame"
                    title="Map showing R&S Auto Works at 7 Auster Cl, Norwich"
                    src="https://www.google.com/maps?q=7%20Auster%20Cl%2C%20Norwich%2C%20United%20Kingdom%2C%20NR6%206BD&amp;output=embed"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    allowfullscreen>
                </iframe>
            </div>
        </div>

        <form class="quote-form" action="{{ route('quoteRequests.store') }}" method="post" data-validate-form data-loading-label="Sending...">
            @csrf

            @if(session('quote_success'))
                <div class="form-alert form-alert-success" role="status">{{ session('quote_success') }}</div>
            @endif

            @if($errors->quote->any())
                <div class="form-alert form-alert-error" role="alert">Please check the highlighted fields and try again.</div>
            @endif

            <div class="honeypot" aria-hidden="true">
                <label for="quote-website">Website</label>
                <input id="quote-website" type="text" name="website" value="" tabindex="-1" autocomplete="off">
            </div>

            <div class="form-grid">
                <div class="field">
                    <label for="name">Name <span class="required-marker" aria-hidden="true">*</span></label>
                    <input id="name" name="name" type="text" value="{{ old('name') }}" maxlength="100" autocomplete="name" data-required>
                    @error('name', 'quote')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label for="email">Email <span class="required-marker" aria-hidden="true">*</span></label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" maxlength="150" autocomplete="email" data-required>
                    @error('email', 'quote')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label for="phone">Phone</label>
                    <input id="phone" name="phone" type="tel" value="{{ old('phone') }}" maxlength="50" autocomplete="tel">
                    @error('phone', 'quote')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label for="vehicle_model">Vehicle model <span class="required-marker" aria-hidden="true">*</span></label>
                    <input id="vehicle_model" name="vehicle_model" type="text" value="{{ old('vehicle_model') }}" maxlength="150" placeholder="BMW 335i, MINI Cooper S, E46 drift car" data-required>
                    @error('vehicle_model', 'quote')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label for="service_required">Service required <span class="required-marker" aria-hidden="true">*</span></label>
                    <select id="service_required" name="service_required" data-required>
                        <option value="">Select a service</option>
                        @foreach(['Diagnostics', 'Repair', 'Coding', 'Engine rebuild', '8HP swap', 'Drift build', 'Turbo build', 'Performance build', 'Custom project', 'Other'] as $service)
                            <option value="{{ $service }}" @selected(old('service_required') === $service)>{{ $service }}</option>
                        @endforeach
                    </select>
                    @error('service_required', 'quote')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label for="preferred_contact_method">Preferred contact method <span class="required-marker" aria-hidden="true">*</span></label>
                    <select id="preferred_contact_method" name="preferred_contact_method" data-required>
                        <option value="">Select contact method</option>
                        @foreach(['Email', 'Phone', 'WhatsApp'] as $method)
                            <option value="{{ $method }}" @selected(old('preferred_contact_method') === $method)>{{ $method }}</option>
                        @endforeach
                    </select>
                    @error('preferred_contact_method', 'quote')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="field">
                <label for="message">Message <span class="required-marker" aria-hidden="true">*</span></label>
                <textarea id="message" name="message" rows="6" minlength="10" maxlength="3000" data-required data-min-length="10" placeholder="Tell us the fault, work needed, vehicle details, current modifications and any deadlines.">{{ old('message') }}</textarea>
                @error('message', 'quote')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            <button class="button button-primary form-submit" type="submit">Send Quote Request</button>
        </form>
    </div>
</section>
