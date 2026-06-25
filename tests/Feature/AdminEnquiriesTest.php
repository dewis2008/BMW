<?php

namespace Tests\Feature;

use App\Models\QuoteRequest;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminEnquiriesTest extends TestCase
{
    use RefreshDatabase;

    public function test_enquiries_are_protected_from_guests(): void
    {
        $this->get(route('admin.enquiries.index'))
            ->assertRedirect(route('admin.login'));
    }

    public function test_admin_can_view_update_and_delete_quote_enquiries(): void
    {
        $admin = User::factory()->create([
            'is_admin' => true,
        ]);

        $quoteRequest = QuoteRequest::create([
            'name' => 'Taylor Builder',
            'email' => 'taylor@example.com',
            'phone' => '01603 111111',
            'vehicle_model' => 'BMW E90 330d',
            'service_required' => '8HP swap',
            'preferred_contact_method' => 'Phone',
            'message' => 'I need to discuss an 8HP swap for a BMW project.',
        ]);

        $this->actingAs($admin)
            ->get(route('admin.enquiries.index'))
            ->assertOk()
            ->assertSee('Taylor Builder')
            ->assertSee('8HP swap');

        $this->actingAs($admin)
            ->patch(route('admin.enquiries.update', ['quote', $quoteRequest->id]), [
                'status' => 'contacted',
            ])
            ->assertRedirect();

        $this->assertDatabaseHas('quote_requests', [
            'id' => $quoteRequest->id,
            'status' => 'contacted',
        ]);

        $this->actingAs($admin)
            ->delete(route('admin.enquiries.destroy', ['quote', $quoteRequest->id]))
            ->assertRedirect(route('admin.enquiries.index'));

        $this->assertDatabaseMissing('quote_requests', [
            'id' => $quoteRequest->id,
        ]);
    }
}
