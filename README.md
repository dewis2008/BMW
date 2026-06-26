# R&S Auto Works Website

Production-ready Laravel website for R&S Auto Works, a BMW and MINI specialist garage in Norwich, UK.

## Stack

- Laravel 13
- Blade templates
- Vite
- CSS
- Plain JavaScript
- SQLite by default for local development

## Installation

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan storage:link
npm run build
```

## Environment Setup

Set the main application values in `.env`:

```env
APP_NAME="R&S Auto Works"
APP_URL=https://example.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=rs_autoworks
DB_USERNAME=
DB_PASSWORD=

MAIL_MAILER=log
MAIL_FROM_ADDRESS="website@example.com"
MAIL_FROM_NAME="${APP_NAME}"
BUSINESS_EMAIL=garage@example.com
GOOGLE_ANALYTICS_ID=G-XXXXXXXXXX
```

For local development, SQLite is already supported:

```env
DB_CONNECTION=sqlite
```

Create the SQLite file if needed:

```bash
touch database/database.sqlite
php artisan migrate
```

## Mail Setup

Quote and quick enquiry notifications are sent to `BUSINESS_EMAIL` when it is configured.

Local options:

```env
MAIL_MAILER=log
```

or Mailpit/Mailhog:

```env
MAIL_MAILER=smtp
MAIL_HOST=127.0.0.1
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
```

Production options can use any Laravel-supported mail driver such as SMTP, Postmark, Resend or SES.

## Privacy, Cookies and Analytics

Public legal pages are available at:

```text
/privacy-policy
/cookies-policy
```

Google Analytics is optional and only loads after a visitor accepts analytics cookies in the consent banner. Set the GA4 measurement ID in `.env`:

```env
GOOGLE_ANALYTICS_ID=G-XXXXXXXXXX
```

If `GOOGLE_ANALYTICS_ID` is empty, the analytics banner and Cookie settings control are not shown.

## Admin User

Create or promote an admin user:

```bash
php artisan app:create-admin-user --email=admin@example.com --password="change-this-password"
```

Passwords must be at least 10 characters. The admin login page is:

```text
/admin/login
```

The public navigation intentionally does not link to the admin area.

## Local Development

Run Laravel and Vite separately:

```bash
php artisan serve
npm run dev
```

Or use Laravel's combined dev script:

```bash
composer run dev
```

## Production Build

```bash
composer install --no-dev --optimize-autoloader
npm ci
npm run build
php artisan migrate --force
php artisan storage:link
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

Point the web server document root at `public/`.

## Forms

The quote form stores submissions in `quote_requests`.

The quick enquiry form stores submissions in `contact_messages`.

Both forms include:

- CSRF protection
- server-side validation
- frontend validation
- honeypot spam protection
- rate limiting
- database persistence
- optional email notifications

## Admin Enquiries

Protected admin routes:

```text
/admin/enquiries
/admin/enquiries/{source}/{id}
```

Admin users can:

- view quote and quick enquiry submissions
- paginate enquiry records
- update status: `new`, `contacted`, `completed`, `archived`
- delete spam submissions

## Admin Gallery

Protected admin routes:

```text
/admin/gallery-items
/admin/gallery-items/create
/admin/gallery-items/{id}/edit
```

Admin users can:

- add gallery items with image uploads
- choose gallery category
- write title, alt text and short description
- set sort order
- publish or draft items
- edit existing gallery items
- delete gallery items

Uploaded gallery images are stored on Laravel's public disk under:

```text
storage/app/public/gallery
```

The public symlink is required:

```bash
php artisan storage:link
```

## Images

Supplied images are stored in:

```text
public/images/work
```

Initial gallery records are inserted by the gallery migration into:

```text
gallery_items
```

The public gallery is paginated and can be filtered by category. Add approved Facebook or Instagram images through `/admin/gallery-items` after the client confirms usage permission.

## Verification

Run:

```bash
php artisan test
vendor/bin/pint --test
npm run build
```

Current test coverage includes:

- homepage response
- quote request validation, persistence and mail hook
- honeypot rejection
- quick enquiry persistence and mail hook
- protected admin access
- admin status update and delete flow
- public gallery pagination and filtering
- admin gallery create, update and delete flow
