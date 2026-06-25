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

        <nav class="gallery-filters" aria-label="Gallery filters">
            <a
                class="filter-button {{ $selectedGalleryCategory ? '' : 'is-active' }}"
                href="{{ route('home') }}#gallery"
                data-gallery-filter="All"
                @if(! $selectedGalleryCategory) aria-current="true" @endif
            >
                All
            </a>

            @foreach($galleryCategories as $filter)
                <a
                    class="filter-button {{ $selectedGalleryCategory === $filter ? 'is-active' : '' }}"
                    href="{{ route('home', ['gallery_category' => $filter]) }}#gallery"
                    data-gallery-filter="{{ $filter }}"
                    @if($selectedGalleryCategory === $filter) aria-current="true" @endif
                >
                    {{ $filter }}
                </a>
            @endforeach
        </nav>

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
            @php
                $currentPage = $galleryItems->currentPage();
                $lastPage = $galleryItems->lastPage();
                $startPage = max(1, $currentPage - 2);
                $endPage = min($lastPage, $currentPage + 2);
            @endphp

            <nav class="gallery-pagination" aria-label="Gallery pages">
                @if($galleryItems->onFirstPage())
                    <span aria-disabled="true">Previous</span>
                @else
                    <a href="{{ $galleryItems->previousPageUrl() }}">Previous</a>
                @endif

                <div class="gallery-pagination-pages">
                    @if($startPage > 1)
                        <a href="{{ $galleryItems->url(1) }}">1</a>

                        @if($startPage > 2)
                            <span aria-hidden="true">...</span>
                        @endif
                    @endif

                    @for($page = $startPage; $page <= $endPage; $page++)
                        @if($page === $currentPage)
                            <span class="is-active" aria-current="page">{{ $page }}</span>
                        @else
                            <a href="{{ $galleryItems->url($page) }}">{{ $page }}</a>
                        @endif
                    @endfor

                    @if($endPage < $lastPage)
                        @if($endPage < $lastPage - 1)
                            <span aria-hidden="true">...</span>
                        @endif

                        <a href="{{ $galleryItems->url($lastPage) }}">{{ $lastPage }}</a>
                    @endif
                </div>

                @if($galleryItems->hasMorePages())
                    <a href="{{ $galleryItems->nextPageUrl() }}">Next</a>
                @else
                    <span aria-disabled="true">Next</span>
                @endif
            </nav>

            <p class="gallery-pagination-status">Page {{ $currentPage }} of {{ $lastPage }}</p>
        @endif
    </div>
</section>
