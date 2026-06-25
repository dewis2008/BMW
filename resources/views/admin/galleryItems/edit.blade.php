@extends('layouts.admin')

@section('title', 'Edit Gallery Item | R&S Auto Works Admin')

@section('content')
    <section class="admin-panel" aria-labelledby="edit-gallery-heading">
        <div class="admin-panel-heading">
            <div>
                <p class="eyebrow">Gallery</p>
                <h1 id="edit-gallery-heading">Edit gallery item</h1>
            </div>
            <a class="button button-secondary button-small" href="{{ route('admin.galleryItems.index') }}">Back to gallery</a>
        </div>

        @include('admin.galleryItems.form', [
            'action' => route('admin.galleryItems.update', $galleryItem),
            'method' => 'patch',
            'submitLabel' => 'Update Gallery Item',
        ])
    </section>
@endsection
