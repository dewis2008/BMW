<section class="section section-panel" id="gallery" aria-labelledby="gallery-heading">
    <div class="section-shell">
        <div class="section-heading split-heading">
            <div>
                <p class="eyebrow">Our work</p>
                <h2 id="gallery-heading">Workshop work and BMW performance projects.</h2>
            </div>
            {{-- Add approved Facebook and Instagram images to the gallery data in resources/views/home.blade.php after the client confirms usage permission. --}}
            <p>Browse workshop repairs, diagnostics, coding, engine work and BMW performance builds from R&S Auto Works.</p>
        </div>

        <div class="gallery-filters" aria-label="Gallery filters">
            <a class="filter-button {{ $selectedGalleryCategory ? '' : 'is-active' }}" href="{{ route('home') }}#gallery" data-gallery-filter="All" aria-pressed="{{ $selectedGalleryCategory ? 'false' : 'true' }}">All</a>
            @foreach($galleryCategories as $filter)
                <a class="filter-button {{ $selectedGalleryCategory === $filter ? 'is-active' : '' }}" href="{{ route('home', ['gallery_category' => $filter]) }}#gallery" data-gallery-filter="{{ $filter }}" aria-pressed="{{ $selectedGalleryCategory === $filter ? 'true' : 'false' }}">{{ $filter }}</a>
            @endforeach
        </div>

        <div class="gallery-grid" data-gallery-grid>
            @foreach($galleryItems as $item)
                <article class="gallery-item" data-gallery-item data-category="{{ $item->category }}">
                    <img src="{{ $item->imageUrl() }}" alt="{{ $item->image_alt }}" loading="lazy">
                    <div class="gallery-content">
                        <span>{{ $item->category }}</span>
                        <h3>{{ $item->title }}</h3>
                        <p>{{ $item->description }}</p>
                    </div>
                </article>
            @endforeach
        </div>

        @if($galleryItems->isEmpty())
            <p class="gallery-empty">No gallery items are available in this category yet.</p>
        @endif

        @if($galleryItems->hasPages())
            <nav class="gallery-pagination" aria-label="Gallery pages">
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
    </div>
</section>
