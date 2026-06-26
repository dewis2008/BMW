@extends('layouts.admin')

@section('title', 'Gallery | R&S Auto Works Admin')

@section('content')
    <section class="admin-panel" aria-labelledby="gallery-admin-heading">
        <div class="admin-panel-heading">
            <div>
                <p class="eyebrow">Gallery</p>
                <h1 id="gallery-admin-heading">Manage gallery items</h1>
            </div>
            <a class="button button-primary" href="{{ route('admin.galleryItems.create') }}">Add Gallery Item</a>
        </div>

        <div class="gallery-table-overview" aria-label="Gallery item summary">
            <span><strong>{{ $galleryItems->total() }}</strong> total items</span>
            <span><strong>{{ $galleryItems->where('is_published', true)->count() }}</strong> published on this page</span>
        </div>

        <div class="admin-table-wrap gallery-table-wrap">
            <table class="admin-table gallery-admin-table">
                <thead>
                    <tr>
                        <th scope="col">Preview</th>
                        <th scope="col">Gallery item</th>
                        <th scope="col">Category</th>
                        <th scope="col">Sort</th>
                        <th scope="col">Status</th>
                        <th scope="col">Updated</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($galleryItems as $galleryItem)
                        <tr>
                            <td class="gallery-preview-cell" data-label="Preview">
                                <a class="gallery-table-preview" href="{{ route('admin.galleryItems.edit', $galleryItem) }}" aria-label="Edit {{ $galleryItem->title }}">
                                    <img src="{{ $galleryItem->imageUrl() }}" alt="{{ $galleryItem->image_alt }}">
                                </a>
                            </td>
                            <td class="gallery-item-cell" data-label="Gallery item">
                                <div class="gallery-title-row">
                                    <a class="gallery-table-title" href="{{ route('admin.galleryItems.edit', $galleryItem) }}">{{ $galleryItem->title }}</a>
                                    <span class="gallery-item-id">#{{ $galleryItem->id }}</span>
                                </div>
                                <p class="table-subtext gallery-table-description">{{ $galleryItem->description }}</p>
                            </td>
                            <td class="gallery-category-cell" data-label="Category">
                                {{ $galleryItem->category }}
                            </td>
                            <td class="gallery-sort-cell" data-label="Sort">
                                {{ $galleryItem->sort_order }}
                            </td>
                            <td data-label="Status">
                                <span class="gallery-status {{ $galleryItem->is_published ? 'is-published' : 'is-draft' }}">
                                    {{ $galleryItem->is_published ? 'Published' : 'Draft' }}
                                </span>
                            </td>
                            <td data-label="Updated">
                                <time class="gallery-updated-time" datetime="{{ $galleryItem->updated_at->toIso8601String() }}">
                                    <span>{{ $galleryItem->updated_at->format('d M Y') }}</span>
                                    <span>{{ $galleryItem->updated_at->format('H:i') }}</span>
                                </time>
                            </td>
                            <td data-label="Actions">
                                <div class="table-actions gallery-table-actions">
                                    <a class="button button-primary button-small" href="{{ route('admin.galleryItems.edit', $galleryItem) }}">Edit</a>
                                    <form method="post" action="{{ route('admin.galleryItems.destroy', $galleryItem) }}">
                                        @csrf
                                        @method('delete')
                                        <button class="button button-danger button-small" type="submit" data-confirm-delete>Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="gallery-table-empty" colspan="7">
                                <div class="gallery-empty-state">
                                    <strong>No gallery items yet</strong>
                                    <span>Add the first project image to start building the public gallery.</span>
                                    <a class="button button-primary" href="{{ route('admin.galleryItems.create') }}">Add Gallery Item</a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($galleryItems->hasPages())
            <nav class="admin-pagination" aria-label="Gallery item pages">
                @if($galleryItems->onFirstPage())
                    <span>Previous</span>
                @else
                    <a href="{{ $galleryItems->previousPageUrl() }}">Previous</a>
                @endif

                <span>Page {{ $galleryItems->currentPage() }} of {{ $galleryItems->lastPage() }}</span>

                @if($galleryItems->hasMorePages())
                    <a href="{{ $galleryItems->nextPageUrl() }}">Next</a>
                @else
                    <span>Next</span>
                @endif
            </nav>
        @endif
    </section>
@endsection
