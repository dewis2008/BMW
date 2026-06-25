const showFieldError = (field, message) => {
    field.setAttribute('aria-invalid', 'true');

    const wrapper = field.closest('.field');

    if (! wrapper) {
        return;
    }

    let error = wrapper.querySelector('.js-field-error');

    if (! error) {
        error = document.createElement('p');
        error.className = 'js-field-error';
        wrapper.appendChild(error);
    }

    error.textContent = message;
};

const clearFieldError = (field) => {
    field.removeAttribute('aria-invalid');

    const wrapper = field.closest('.field');
    const error = wrapper?.querySelector('.js-field-error');

    if (error) {
        error.remove();
    }
};

const validateField = (field) => {
    clearFieldError(field);

    const value = field.value.trim();
    const minLength = Number(field.dataset.minLength || field.getAttribute('minlength') || 0);

    if (field.hasAttribute('data-required') && value.length === 0) {
        showFieldError(field, 'This field is required.');

        return false;
    }

    if (value.length > 0 && field.type === 'email' && ! field.validity.valid) {
        showFieldError(field, 'Enter a valid email address.');

        return false;
    }

    if (value.length > 0 && minLength > 0 && value.length < minLength) {
        showFieldError(field, `Enter at least ${minLength} characters.`);

        return false;
    }

    return true;
};

document.querySelectorAll('[data-validate-form]').forEach((form) => {
    const fields = form.querySelectorAll('input, select, textarea');
    const submit = form.querySelector('[type="submit"]');

    fields.forEach((field) => {
        field.addEventListener('input', () => validateField(field));
        field.addEventListener('change', () => validateField(field));
    });

    form.addEventListener('submit', (event) => {
        let isValid = true;

        fields.forEach((field) => {
            if (field.type === 'hidden' || field.closest('.honeypot')) {
                return;
            }

            if (! validateField(field)) {
                isValid = false;
            }
        });

        if (! isValid) {
            event.preventDefault();
            form.querySelector('[aria-invalid="true"]')?.focus();

            return;
        }

        if (submit) {
            submit.disabled = true;
            submit.dataset.originalLabel = submit.textContent;
            submit.textContent = form.dataset.loadingLabel || 'Sending...';
        }
    });
});
