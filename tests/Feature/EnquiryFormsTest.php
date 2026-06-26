<?php

namespace Tests\Feature;

use App\Mail\ContactMessageReceived;
use App\Mail\QuoteRequestReceived;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class EnquiryFormsTest extends TestCase
{
    use RefreshDatabase;

    public function test_quote_requests_are_validated_stored_and_sent_to_the_business_email(): void
    {
        Mail::fake();

        config(['services.business.email' => 'workshop@example.com']);

        $response = $this->post(route('quoteRequests.store'), [
            'name' => 'Alex Driver',
            'email' => 'alex@example.com',
            'phone' => '01603 000000',
            'vehicle_model' => 'BMW 335i',
            'service_required' => 'Diagnostics',
            'preferred_contact_method' => 'Email',
            'message' => 'The car has a drivetrain warning and needs diagnostic work.',
        ]);

        $response
            ->assertRedirect(route('home').'#quote-form')
            ->assertSessionHas('quote_success');

        $this->assertDatabaseHas('quote_requests', [
            'name' => 'Alex Driver',
            'email' => 'alex@example.com',
            'vehicle_model' => 'BMW 335i',
            'service_required' => 'Diagnostics',
            'status' => 'new',
        ]);

        Mail::assertSent(QuoteRequestReceived::class);
    }

    public function test_quote_honeypot_blocks_spam_submissions(): void
    {
        $response = $this->post(route('quoteRequests.store'), [
            'name' => 'Spam Bot',
            'email' => 'spam@example.com',
            'vehicle_model' => 'BMW 320d',
            'service_required' => 'Other',
            'preferred_contact_method' => 'Email',
            'message' => 'This message should be rejected by the honeypot.',
            'website' => 'https://spam.example',
        ]);

        $response
            ->assertRedirect(route('home').'#quote-form')
            ->assertSessionHasErrors('website', null, 'quote');

        $this->assertDatabaseMissing('quote_requests', [
            'email' => 'spam@example.com',
        ]);
    }

    public function test_quote_requests_require_a_vehicle_model(): void
    {
        $response = $this->post(route('quoteRequests.store'), [
            'name' => 'Alex Driver',
            'email' => 'alex@example.com',
            'service_required' => 'Diagnostics',
            'preferred_contact_method' => 'Email',
            'message' => 'The car has a drivetrain warning and needs diagnostic work.',
        ]);

        $response
            ->assertRedirect(route('home').'#quote-form')
            ->assertSessionHasErrors('vehicle_model', null, 'quote');
    }

    public function test_quick_contact_messages_are_stored_and_sent(): void
    {
        Mail::fake();

        config(['services.business.email' => 'workshop@example.com']);

        $response = $this->post(route('contactMessages.store'), [
            'name' => 'Jamie Owner',
            'email_or_phone' => 'jamie@example.com',
            'message' => 'Can you look at an E46 cooling issue next week?',
        ]);

        $response
            ->assertRedirect(route('home').'#quote-form')
            ->assertSessionHas('contact_success');

        $this->assertDatabaseHas('contact_messages', [
            'name' => 'Jamie Owner',
            'email_or_phone' => 'jamie@example.com',
            'status' => 'new',
        ]);

        Mail::assertSent(ContactMessageReceived::class);
    }
}
