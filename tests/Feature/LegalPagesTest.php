<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LegalPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_privacy_policy_page_is_available(): void
    {
        $this->get(route('privacyPolicy'))
            ->assertOk()
            ->assertSee('Privacy Policy')
            ->assertSee('R&S Auto Works');
    }

    public function test_cookies_policy_page_is_available(): void
    {
        $this->get(route('cookiesPolicy'))
            ->assertOk()
            ->assertSee('Cookies Policy')
            ->assertSee('_ga');
    }

    public function test_cookie_consent_banner_uses_configured_google_analytics_id(): void
    {
        config(['services.google_analytics.measurement_id' => 'G-TEST12345']);

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('data-cookie-consent', false)
            ->assertSee('G-TEST12345', false)
            ->assertSee(route('cookiesPolicy'), false);
    }

    public function test_cookie_consent_banner_is_hidden_without_google_analytics_id(): void
    {
        config(['services.google_analytics.measurement_id' => null]);

        $this->get(route('home'))
            ->assertOk()
            ->assertDontSee('data-cookie-consent', false)
            ->assertDontSee('Cookie settings');
    }
}
