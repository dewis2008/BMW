<?php

namespace Tests\Feature;

use App\Models\GalleryItem;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class GalleryItemsTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_gallery_is_paginated(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee('BMW fault finding')
            ->assertSee('Page 1 of 2')
            ->assertDontSee('Turbo BMW projects');

        $this->get(route('home', ['gallery_page' => 2]))
            ->assertOk()
            ->assertSee('Turbo BMW projects')
            ->assertSee('Page 2 of 2');
    }

    public function test_public_gallery_can_be_filtered_by_category(): void
    {
        $this->get(route('home', ['gallery_category' => 'Drift Builds']))
            ->assertOk()
            ->assertSee('Drift build testing')
            ->assertDontSee('BMW repair work');
    }

    public function test_admin_can_create_update_and_delete_gallery_items(): void
    {
        Storage::fake('public');

        $admin = User::factory()->create([
            'is_admin' => true,
        ]);

        $this->actingAs($admin)
            ->post(route('admin.galleryItems.store'), [
                'title' => 'Fresh turbo build',
                'category' => 'Turbo Builds',
                'description' => 'A new turbo BMW project added through the admin area.',
                'image_alt' => 'Turbo BMW project in the workshop',
                'image' => UploadedFile::fake()->image('turbo-build.jpg', 1200, 800),
                'sort_order' => 5,
                'is_published' => 1,
            ])
            ->assertRedirect(route('admin.galleryItems.index'));

        $galleryItem = GalleryItem::where('title', 'Fresh turbo build')->firstOrFail();

        Storage::disk('public')->assertExists($galleryItem->image_path);

        $this->assertDatabaseHas('gallery_items', [
            'id' => $galleryItem->id,
            'category' => 'Turbo Builds',
            'is_published' => true,
        ]);

        $this->actingAs($admin)
            ->patch(route('admin.galleryItems.update', $galleryItem), [
                'title' => 'Updated turbo build',
                'category' => 'Performance Builds',
                'description' => 'Updated gallery copy for the public website.',
                'image_alt' => 'Updated BMW performance project',
                'sort_order' => 15,
                'is_published' => 0,
            ])
            ->assertRedirect(route('admin.galleryItems.index'));

        $this->assertDatabaseHas('gallery_items', [
            'id' => $galleryItem->id,
            'title' => 'Updated turbo build',
            'category' => 'Performance Builds',
            'is_published' => false,
        ]);

        $this->actingAs($admin)
            ->delete(route('admin.galleryItems.destroy', $galleryItem))
            ->assertRedirect(route('admin.galleryItems.index'));

        $this->assertDatabaseMissing('gallery_items', [
            'id' => $galleryItem->id,
        ]);

        Storage::disk('public')->assertMissing($galleryItem->image_path);
    }
}
