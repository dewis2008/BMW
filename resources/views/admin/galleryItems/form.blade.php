<form class="admin-form gallery-admin-form" method="post" action="{{ $action }}" enctype="multipart/form-data" data-validate-form data-loading-label="Saving...">
    @csrf

    @if($method !== 'post')
        @method($method)
    @endif

    <div class="form-grid">
        <div class="field">
            <label for="title">Title</label>
            <input id="title" name="title" type="text" value="{{ old('title', $galleryItem->title) }}" maxlength="120" data-required>
            @error('title')
                <p class="field-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="field">
            <label for="category">Category</label>
            <select id="category" name="category" data-required>
                <option value="">Select a category</option>
                @foreach($categories as $category)
                    <option value="{{ $category }}" @selected(old('category', $galleryItem->category) === $category)>{{ $category }}</option>
                @endforeach
            </select>
            @error('category')
                <p class="field-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="field">
            <label for="sort_order">Sort order</label>
            <input id="sort_order" name="sort_order" type="number" min="0" max="9999" value="{{ old('sort_order', $galleryItem->sort_order ?? 0) }}">
            @error('sort_order')
                <p class="field-error">{{ $message }}</p>
            @enderror
        </div>

        <label class="checkbox-field gallery-publish-field">
            <input type="hidden" name="is_published" value="0">
            <input type="checkbox" name="is_published" value="1" @checked(old('is_published', $galleryItem->is_published ?? true))>
            <span>Published on public gallery</span>
        </label>
    </div>

    @if($galleryItem->exists)
        <figure class="current-gallery-image">
            <img src="{{ $galleryItem->imageUrl() }}" alt="{{ $galleryItem->image_alt }}">
            <figcaption>Current image. Upload a new file only if this should be replaced.</figcaption>
        </figure>
    @endif

    <div class="field">
        <label for="image">Image {{ $galleryItem->exists ? '(optional)' : '' }}</label>
        <input id="image" name="image" type="file" accept="image/jpeg,image/png,image/webp" {{ $galleryItem->exists ? '' : 'data-required' }}>
        @error('image')
            <p class="field-error">{{ $message }}</p>
        @enderror
    </div>

    <div class="field">
        <label for="image_alt">Image alt text</label>
        <input id="image_alt" name="image_alt" type="text" value="{{ old('image_alt', $galleryItem->image_alt) }}" maxlength="180" data-required>
        @error('image_alt')
            <p class="field-error">{{ $message }}</p>
        @enderror
    </div>

    <div class="field">
        <label for="description">Short description</label>
        <textarea id="description" name="description" rows="5" maxlength="500" data-required>{{ old('description', $galleryItem->description) }}</textarea>
        @error('description')
            <p class="field-error">{{ $message }}</p>
        @enderror
    </div>

    <button class="button button-primary form-submit" type="submit">{{ $submitLabel }}</button>
</form>
