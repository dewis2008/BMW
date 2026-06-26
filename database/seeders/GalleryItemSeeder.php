<?php

namespace Database\Seeders;

use App\Models\GalleryItem;
use Illuminate\Database\Seeder;

class GalleryItemSeeder extends Seeder
{
    public function run(): void
    {
        $categories = GalleryItem::categories();

        $images = [
            'images/work/rs-workshop-bmw.jpg',
            'images/work/rs-workshop-sign.jpg',
            'images/work/rs-logo.jpg',
            'images/work/rs-drift-hero.jpg',
            'images/work/rs-drift-coupe.jpg',
        ];

        $descriptions = [
            'Repairs' => 'Dummy gallery entry for BMW repair work, inspections and workshop jobs.',
            'Diagnostics' => 'Dummy gallery entry for BMW diagnostics, warning lights and fault tracing.',
            'Coding' => 'Dummy gallery entry for BMW coding, programming and retrofit support.',
            'Engine Rebuilds' => 'Dummy gallery entry for BMW engine rebuild preparation and mechanical work.',
            '8HP Swaps' => 'Dummy gallery entry for BMW 8HP gearbox swap planning and build work.',
            'Drift Builds' => 'Dummy gallery entry for BMW drift build setup, fabrication and testing.',
            'Turbo Builds' => 'Dummy gallery entry for BMW turbo build preparation and performance upgrades.',
            'Performance Builds' => 'Dummy gallery entry for BMW performance upgrades, track setup and project work.',
        ];

        for ($index = 1; $index <= 100; $index++) {
            $number = str_pad((string) $index, 2, '0', STR_PAD_LEFT);
            $category = $categories[($index - 1) % count($categories)];

            GalleryItem::query()->updateOrCreate(
                ['title' => "Dummy BMW gallery item {$number}"],
                [
                    'category' => $category,
                    'image_path' => $images[($index - 1) % count($images)],
                    'image_alt' => "Dummy BMW {$category} gallery item {$number}",
                    'description' => $descriptions[$category],
                    'sort_order' => 1000 + ($index * 10),
                    'is_published' => true,
                ],
            );
        }
    }
}
