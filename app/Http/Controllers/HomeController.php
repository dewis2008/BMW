<?php

namespace App\Http\Controllers;

use App\Models\GalleryItem;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(Request $request): View
    {
        $selectedCategory = $this->selectedCategory($request);

        $galleryQuery = GalleryItem::query()
            ->published()
            ->orderBy('sort_order')
            ->latest();

        if ($selectedCategory) {
            $galleryQuery->where('category', $selectedCategory);
        }

        return view('home', [
            'galleryItems' => $galleryQuery
                ->paginate(8, ['*'], 'gallery_page')
                ->withQueryString()
                ->fragment('gallery'),
            'galleryCategories' => GalleryItem::categories(),
            'selectedGalleryCategory' => $selectedCategory,
        ]);
    }

    private function selectedCategory(Request $request): ?string
    {
        $category = $request->query('gallery_category');

        if (! is_string($category)) {
            return null;
        }

        if (! in_array($category, GalleryItem::categories(), true)) {
            return null;
        }

        return $category;
    }
}
