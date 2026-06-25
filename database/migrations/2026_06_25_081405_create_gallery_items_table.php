<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gallery_items', function (Blueprint $table) {
            $table->id();
            $table->string('title', 120);
            $table->string('category', 80)->index();
            $table->string('image_path');
            $table->string('image_alt', 180);
            $table->text('description');
            $table->unsignedSmallInteger('sort_order')->default(0)->index();
            $table->boolean('is_published')->default(true)->index();
            $table->timestamps();
        });

        $now = now();

        DB::table('gallery_items')->insert([
            [
                'title' => 'BMW fault finding',
                'category' => 'Diagnostics',
                'image_path' => 'images/work/rs-workshop-bmw.jpg',
                'image_alt' => 'BMWs outside R&S Auto Works workshop in Norwich with bonnets open',
                'description' => 'Specialist diagnostics for BMW faults, warning lights and running issues.',
                'sort_order' => 10,
                'is_published' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'BMW repair work',
                'category' => 'Repairs',
                'image_path' => 'images/work/rs-workshop-sign.jpg',
                'image_alt' => 'BMW engine bay outside R&S Auto Works in Norwich',
                'description' => 'Everyday BMW repairs handled by a workshop focused on the marque.',
                'sort_order' => 20,
                'is_published' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Engine work',
                'category' => 'Engine Rebuilds',
                'image_path' => 'images/work/rs-workshop-bmw.jpg',
                'image_alt' => 'BMW workshop scene with multiple cars ready for engine work',
                'description' => 'Engine rebuild support and mechanical work for BMW and MINI owners.',
                'sort_order' => 30,
                'is_published' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'BMW coding',
                'category' => 'Coding',
                'image_path' => 'images/work/rs-logo.jpg',
                'image_alt' => 'R&S Auto Works logo',
                'description' => 'Coding and programming support for BMW functions, modules and retrofits.',
                'sort_order' => 40,
                'is_published' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Drift build testing',
                'category' => 'Drift Builds',
                'image_path' => 'images/work/rs-drift-hero.jpg',
                'image_alt' => 'R&S Auto Works BMW drift car generating smoke on track',
                'description' => 'Real BMW drift build experience, from setup to hard use.',
                'sort_order' => 50,
                'is_published' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Track-focused BMW builds',
                'category' => 'Performance Builds',
                'image_path' => 'images/work/rs-drift-coupe.jpg',
                'image_alt' => 'R&S Auto Works BMW coupe drifting on track',
                'description' => 'Performance work for street, drift and track-focused BMW projects.',
                'sort_order' => 60,
                'is_published' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => '8HP swap projects',
                'category' => '8HP Swaps',
                'image_path' => 'images/work/rs-drift-hero.jpg',
                'image_alt' => 'BMW performance build in motion during a drift run',
                'description' => 'Planning and build support for BMW 8HP gearbox swap projects.',
                'sort_order' => 70,
                'is_published' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Turbo BMW projects',
                'category' => 'Turbo Builds',
                'image_path' => 'images/work/rs-drift-coupe.jpg',
                'image_alt' => 'Turbo BMW project car in R&S Auto Works livery on track',
                'description' => 'Turbo build support for BMW projects needing serious performance.',
                'sort_order' => 80,
                'is_published' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
};
