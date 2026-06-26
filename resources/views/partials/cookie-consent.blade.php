@if(config('services.google_analytics.measurement_id'))
    <section
        class="cookie-consent"
        data-cookie-consent
        data-analytics-id="{{ config('services.google_analytics.measurement_id') }}"
        aria-label="Cookie preferences"
        aria-live="polite"
        hidden>
        <div class="cookie-consent-panel">
            <div class="cookie-consent-copy">
                <p class="cookie-consent-kicker">Cookie choices</p>
                <h2>Can we use analytics cookies?</h2>
                <p>Essential cookies keep the site and forms working. With your permission, Google Analytics helps us understand website visits so we can improve the site.</p>
                <a href="{{ route('cookiesPolicy') }}">Read the cookies policy</a>
            </div>

            <div class="cookie-consent-actions" aria-label="Cookie consent actions">
                <button class="button button-secondary button-small" type="button" data-cookie-decline>Reject optional</button>
                <button class="button button-primary button-small" type="button" data-cookie-accept>Accept analytics</button>
            </div>
        </div>
    </section>
@endif
