<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGalleryItemRequest;
use App\Http\Requests\UpdateGalleryItemRequest;
use App\Models\GalleryItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class GalleryItemController extends Controller
{
    public function index(): View
    {
        return view('admin.galleryItems.index', [
            'galleryItems' => GalleryItem::query()
                ->orderBy('sort_order')
                ->latest()
                ->paginate(15),
        ]);
    }

    public function create(): View
    {
        return view('admin.galleryItems.create', [
            'galleryItem' => new GalleryItem([
                'is_published' => true,
                'sort_order' => 100,
            ]),
            'categories' => GalleryItem::categories(),
        ]);
    }

    public function store(StoreGalleryItemRequest $request): RedirectResponse
    {
        $data = $this->validatedData($request->validated(), $request->boolean('is_published'));
        $data['image_path'] = $request->file('image')->store('gallery', 'public');

        GalleryItem::create($data);

        return redirect()
            ->route('admin.galleryItems.index')
            ->with('admin_success', 'Gallery item added.');
    }

    public function edit(GalleryItem $galleryItem): View
    {
        return view('admin.galleryItems.edit', [
            'galleryItem' => $galleryItem,
            'categories' => GalleryItem::categories(),
        ]);
    }

    public function update(UpdateGalleryItemRequest $request, GalleryItem $galleryItem): RedirectResponse
    {
        $data = $this->validatedData($request->validated(), $request->boolean('is_published'));

        if ($request->hasFile('image')) {
            $this->deleteUploadedImage($galleryItem);
            $data['image_path'] = $request->file('image')->store('gallery', 'public');
        }

        $galleryItem->update($data);

        return redirect()
            ->route('admin.galleryItems.index')
            ->with('admin_success', 'Gallery item updated.');
    }

    public function destroy(GalleryItem $galleryItem): RedirectResponse
    {
        $this->deleteUploadedImage($galleryItem);
        $galleryItem->delete();

        return redirect()
            ->route('admin.galleryItems.index')
            ->with('admin_success', 'Gallery item deleted.');
    }

    private function validatedData(array $validated, bool $isPublished): array
    {
        unset($validated['image']);

        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['is_published'] = $isPublished;

        return $validated;
    }

    private function deleteUploadedImage(GalleryItem $galleryItem): void
    {
        if (! $galleryItem->isUploadedImage()) {
            return;
        }

        Storage::disk('public')->delete($galleryItem->image_path);
    }
}
