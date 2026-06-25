const gallery = document.querySelector('[data-gallery-grid]');
const filters = document.querySelectorAll('[data-gallery-filter]');

if (gallery && filters.length > 0) {
    const items = gallery.querySelectorAll('[data-gallery-item]');

    filters.forEach((filter) => {
        filter.addEventListener('click', () => {
            const selected = filter.dataset.galleryFilter;

            filters.forEach((button) => {
                const isActive = button === filter;
                button.classList.toggle('is-active', isActive);
                button.setAttribute('aria-pressed', String(isActive));
            });

            items.forEach((item) => {
                const shouldShow = selected === 'All' || item.dataset.category === selected;
                item.classList.toggle('is-hidden', ! shouldShow);
            });
        });
    });
}
