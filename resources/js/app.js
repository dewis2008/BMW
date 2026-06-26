import './mobile-menu';
import './gallery';
import './forms';
import './cookie-consent';

document.querySelectorAll('a[href*="#"]').forEach((link) => {
    link.addEventListener('click', (event) => {
        if (event.defaultPrevented) {
            return;
        }

        const url = new URL(link.href);

        if (
            url.pathname !== window.location.pathname ||
            url.search !== window.location.search ||
            ! url.hash
        ) {
            return;
        }

        const target = document.querySelector(url.hash);

        if (! target) {
            return;
        }

        event.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        window.history.pushState(null, '', url.hash);
    });
});

document.querySelectorAll('[data-confirm-delete]').forEach((button) => {
    button.addEventListener('click', (event) => {
        if (! window.confirm('Delete this enquiry permanently?')) {
            event.preventDefault();
        }
    });
});
