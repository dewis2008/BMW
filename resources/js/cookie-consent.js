const consentKey = 'rs_autoworks_cookie_consent';
const acceptedValue = 'accepted';
const declinedValue = 'declined';
const animationDuration = 220;

const banner = document.querySelector('[data-cookie-consent]');
const preferenceButtons = document.querySelectorAll('[data-cookie-preferences]');

const readConsent = () => {
    try {
        return window.localStorage.getItem(consentKey);
    } catch {
        return null;
    }
};

const writeConsent = (value) => {
    try {
        window.localStorage.setItem(consentKey, value);
    } catch {
        // If storage is unavailable, the current page can still honour the click.
    }
};

const deleteCookie = (name, domain = null) => {
    const domainAttribute = domain ? `; domain=${domain}` : '';

    document.cookie = `${name}=; Max-Age=0; path=/${domainAttribute}; SameSite=Lax`;
};

const deleteAnalyticsCookies = () => {
    const hostParts = window.location.hostname.split('.').filter(Boolean);
    const domains = new Set([null, window.location.hostname, `.${window.location.hostname}`]);

    hostParts.forEach((part, index) => {
        const domain = hostParts.slice(index).join('.');

        if (domain.includes('.')) {
            domains.add(`.${domain}`);
        }
    });

    document.cookie
        .split(';')
        .map((cookie) => cookie.trim().split('=')[0])
        .filter((name) => (
            name === '_ga' ||
            name === '_gid' ||
            name === '_gat' ||
            name.startsWith('_ga_') ||
            name.startsWith('_gat_') ||
            name.startsWith('_gac_')
        ))
        .forEach((name) => {
            domains.forEach((domain) => deleteCookie(name, domain));
        });
};

const disableAnalytics = (measurementId) => {
    window[`ga-disable-${measurementId}`] = true;

    if (typeof window.gtag === 'function') {
        window.gtag('consent', 'update', {
            analytics_storage: 'denied',
            ad_storage: 'denied',
            ad_user_data: 'denied',
            ad_personalization: 'denied',
        });
    }

    deleteAnalyticsCookies();
};

const loadAnalytics = (measurementId) => {
    window[`ga-disable-${measurementId}`] = false;
    window.dataLayer = window.dataLayer || [];
    window.gtag = window.gtag || function gtag() {
        window.dataLayer.push(arguments);
    };

    window.gtag('consent', 'default', {
        analytics_storage: 'granted',
        ad_storage: 'denied',
        ad_user_data: 'denied',
        ad_personalization: 'denied',
    });
    window.gtag('js', new Date());
    window.gtag('config', measurementId, {
        anonymize_ip: true,
        send_page_view: true,
    });

    if (document.querySelector('[data-google-analytics-loader]')) {
        return;
    }

    const analyticsScript = document.createElement('script');

    analyticsScript.async = true;
    analyticsScript.dataset.googleAnalyticsLoader = 'true';
    analyticsScript.src = `https://www.googletagmanager.com/gtag/js?id=${encodeURIComponent(measurementId)}`;

    document.head.append(analyticsScript);
};

const showBanner = () => {
    if (! banner) {
        return;
    }

    banner.hidden = false;

    window.requestAnimationFrame(() => {
        banner.classList.add('is-visible');
    });
};

const hideBanner = () => {
    if (! banner) {
        return;
    }

    banner.classList.remove('is-visible');

    window.setTimeout(() => {
        banner.hidden = true;
    }, animationDuration);
};

if (banner) {
    const measurementId = banner.dataset.analyticsId?.trim();

    if (! measurementId) {
        banner.remove();
    } else {
        const savedConsent = readConsent();

        if (savedConsent === acceptedValue) {
            loadAnalytics(measurementId);
        }

        if (savedConsent === declinedValue) {
            disableAnalytics(measurementId);
        }

        if (! savedConsent) {
            showBanner();
        }

        banner.querySelector('[data-cookie-accept]')?.addEventListener('click', () => {
            writeConsent(acceptedValue);
            loadAnalytics(measurementId);
            hideBanner();
        });

        banner.querySelector('[data-cookie-decline]')?.addEventListener('click', () => {
            writeConsent(declinedValue);
            disableAnalytics(measurementId);
            hideBanner();
        });

        preferenceButtons.forEach((button) => {
            button.addEventListener('click', () => {
                showBanner();
            });
        });
    }
}
