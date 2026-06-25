<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

#[Fillable([
    'title',
    'category',
    'image_path',
    'image_alt',
    'description',
    'sort_order',
    'is_published',
])]
class GalleryItem extends Model
{
    public static function categories(): array
    {
        return [
            'Repairs',
            'Diagnostics',
            'Coding',
            'Engine Rebuilds',
            '8HP Swaps',
            'Drift Builds',
            'Turbo Builds',
            'Performance Builds',
        ];
    }

    public function imageUrl(): string
    {
        if (str_starts_with($this->image_path, 'images/')) {
            return asset($this->image_path);
        }

        return Storage::disk('public')->url($this->image_path);
    }

    public function isUploadedImage(): bool
    {
        return ! str_starts_with($this->image_path, 'images/');
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'sort_order' => 'integer',
        ];
    }
}
