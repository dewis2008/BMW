@extends('layouts.admin')

@section('title', 'Gallery | R&S Auto Works Admin')

@section('content')
    <section class="admin-panel" aria-labelledby="gallery-admin-heading">
        <div class="admin-panel-heading">
            <div>
                <p class="eyebrow">Gallery</p>
                <h1 id="gallery-admin-heading">Manage gallery items</h1>
            </div>
            <a class="button button-primary button-small" href="{{ route('admin.galleryItems.create') }}">Add Gallery Item</a>
        </div>

        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Sort</th>
                        <th>Status</th>
                        <th>Updated</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($galleryItems as $galleryItem)
                        <tr>
                            <td>
                                <img class="admin-thumb" src="{{ $galleryItem->imageUrl() }}" alt="{{ $galleryItem->image_alt }}">
                            </td>
                            <td>
                                <a href="{{ route('admin.galleryItems.edit', $galleryItem) }}">{{ $galleryItem->title }}</a>
                                <p class="table-subtext">{{ $galleryItem->description }}</p>
                            </td>
                            <td>{{ $galleryItem->category }}</td>
                            <td>{{ $galleryItem->sort_order }}</td>
                            <td>
                                <span class="status-pill {{ $galleryItem->is_published ? 'status-completed' : 'status-archived' }}">
                                    {{ $galleryItem->is_published ? 'Published' : 'Draft' }}
                                </span>
                            </td>
                            <td>{{ $galleryItem->updated_at->format('d M Y H:i') }}</td>
                            <td>
                                <div class="table-actions">
                                    <a class="button button-secondary button-small" href="{{ route('admin.galleryItems.edit', $galleryItem) }}">Edit</a>
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
                            <td colspan="7">No gallery items have been added yet.</td>
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
