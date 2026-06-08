# Elvora

Elvora is a Laravel-based CMS and admin dashboard focused on fast content management, clean UX, and extensible integrations.

## Quick overview

- **Purpose:** Manage content, categories, contact messages, customer data, and project requests for marketing and operations.
- **Stack:** Laravel, Filament admin, Tailwind CSS, Vite, MySQL/Postgres.
- **Repository:** application code, Filament resources, jobs, and tests.

## Features

- Admin panel powered by Filament
- Blog, Categories, Contact Messages, Projects, Newsletter subscribers
- File storage and media management
- Background jobs and notifications

## Getting started (local)

Prerequisites: PHP 8.1+, Composer, Node.js, and a database (MySQL/Postgres).

Clone and install:

```
git clone <repo-url>
cd elvora
composer install
cp .env.example .env
php artisan key:generate
npm install
npm run dev
php artisan migrate --seed
php artisan storage:link
php artisan serve
```

Open http://127.0.0.1:8000 and log in to the Filament admin to manage content.

## Environment

Set database and mail settings in `.env`. Typical variables:

- `APP_ENV`, `APP_URL`
- `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`
- `MAIL_MAILER`, `MAIL_HOST`, `MAIL_PORT`, `MAIL_USERNAME`, `MAIL_PASSWORD`, `MAIL_FROM_ADDRESS`

## Running tests

```
composer test
```

## Deploy

Build assets and migrate on the server:

```
npm run build
composer install --no-dev --optimize-autoloader
php artisan migrate --force
```

## Contributing

Contributions are welcome—please open issues or pull requests. Follow PSR-12, update tests, and provide migration files where necessary.

## Maintainers & Contact

Project maintainers: see the repository owners. For urgent issues, open a GitHub issue or email the team listed in the project settings.

## License

This project is licensed under the MIT License.
