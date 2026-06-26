const gallery = document.querySelector('#gallery');

const galleryControlSelector = '.gallery-filters a, .gallery-pagination a';

const scrollToGalleryTop = () => {
    gallery.scrollIntoView({ behavior: 'smooth', block: 'start' });
};

const galleryUrl = (href) => {
    const url = new URL(href, window.location.href);

    if (url.origin !== window.location.origin || url.pathname !== window.location.pathname) {
        return null;
    }

    return url;
};

const replaceGallery = async (url, shouldPushState = true, shouldScrollToGallery = false) => {
    gallery.setAttribute('aria-busy', 'true');

    const response = await fetch(url, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
        },
    });

    if (! response.ok) {
        window.location.href = url.href;

        return;
    }

    const html = await response.text();
    const nextDocument = new DOMParser().parseFromString(html, 'text/html');
    const nextGallery = nextDocument.querySelector('#gallery');

    if (! nextGallery) {
        window.location.href = url.href;

        return;
    }

    gallery.innerHTML = nextGallery.innerHTML;
    gallery.removeAttribute('aria-busy');

    if (shouldPushState) {
        window.history.pushState(null, '', url);
    }

    bindGalleryControls();

    if (shouldScrollToGallery) {
        scrollToGalleryTop();
    }
};

const bindGalleryControls = () => {
    gallery.querySelectorAll(galleryControlSelector).forEach((link) => {
        link.addEventListener('click', (event) => {
            if (event.button !== 0 || event.metaKey || event.ctrlKey || event.shiftKey || event.altKey) {
                return;
            }

            const url = galleryUrl(link.href);

            if (! url) {
                return;
            }

            event.preventDefault();
            replaceGallery(url, true, link.closest('.gallery-pagination') !== null).catch(() => {
                window.location.href = url.href;
            });
        });
    });
};

if (gallery) {
    bindGalleryControls();

    window.addEventListener('popstate', () => {
        const url = galleryUrl(window.location.href);

        if (! url) {
            return;
        }

        replaceGallery(url, false, url.searchParams.has('gallery_page')).catch(() => {
            window.location.reload();
        });
    });
}
