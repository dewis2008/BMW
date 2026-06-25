@extends('layouts.admin')

@section('title', 'Add Gallery Item | R&S Auto Works Admin')

@section('content')
    <section class="admin-panel" aria-labelledby="create-gallery-heading">
        <div class="admin-panel-heading">
            <div>
                <p class="eyebrow">Gallery</p>
                <h1 id="create-gallery-heading">Add gallery item</h1>
            </div>
            <a class="button button-secondary button-small" href="{{ route('admin.galleryItems.index') }}">Back to gallery</a>
        </div>

        @include('admin.galleryItems.form', [
            'action' => route('admin.galleryItems.store'),
            'method' => 'post',
            'submitLabel' => 'Add Gallery Item',
        ])
    </section>
@endsection
