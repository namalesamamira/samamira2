<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## setup

## Local development workflow

This project uses an npm-first workflow with Laravel as the application runtime and Vite as the frontend build/watch tool.

### Development & Server

- `npm run dev` — starts the Vite dev server on 0.0.0.0 for frontend development with HMR
- `npm run build` — performs a production frontend build (runs `build:less` first)
- `npm run ssh` — opens a bash shell into the running PHP-Apache container as www-data

### Docker Infrastructure

- `npm run down` — stops Docker services (compose down)
- `npm run permissions:fix` — fixes Docker permissions on storage/bootstrap folders (run as root)
- `npm run predev` — automatically runs before `npm run dev` to start mysql and php-apache containers

### Starting a new project

Copy `.env.example` to `.env` and set `APP_NAME` to the new project name.
Use letters, digits, or underscores, starting with a letter so the name works
for both Docker and MySQL. The template derives `DB_DATABASE="${APP_NAME}"`
and `DB_TEST_DATABASE="${APP_NAME}_test"`, keeping Laravel and Docker aligned.

Docker Compose reads `.env` automatically and names containers
`mysql-${APP_NAME}` and `php-apache-${APP_NAME}`. The MySQL volume is named
`${COMPOSE_PROJECT_NAME}_mysql-${APP_NAME}`; Compose defaults its project name
to the directory name. A new project name selects a separate volume, and MySQL
creates `DB_DATABASE` on its first startup with an empty volume.

The current project's `.env` is unchanged, retaining its existing `database`
database and volume. Changing `DB_DATABASE` on an initialized volume does not
create or rename a database. Stop the old stack before changing names and never
use `docker compose down -v` unless you intend to delete its data.
If running old and new projects simultaneously, give the new project different
published ports. Exported shell variables override `.env` values in Compose.

### Testing & Quality

- `npm run test` — runs PHP unit and feature tests with PHPUnit
- `npm run test:unit` — runs PHP unit tests only
- `npm run test:feature` — runs PHP feature tests only
- `npm run test:quality` — runs typecheck and format check
- `npm run test:all` — runs all quality checks, tests, and Playwright e2e tests
- `npm run playwright` — runs Playwright e2e tests
- `npm run playwright:ui` — runs Playwright tests with interactive UI
- `npm run playwright:write` — generates Playwright test code (codegen)
- `npm run ci` — runs lint, lint:php, test, and build (CI pipeline)

### Code Quality & Linting

- `npm run lint` — lints and fixes JavaScript/Vue files in resources/js with ESLint
- `npm run format` — formats JavaScript/Vue/CSS files with Prettier
- `npm run format:check` — checks format compliance without fixing
- `npm run lint:php` — analyzes PHP code with PHPStan (static analysis)
- `npm run lint:php:fix` — fixes PHP code issues with Laravel Pint
- `npm run typecheck` — runs TypeScript type checking (no emit)

### Database & Backups

- `npm run backup:db` — creates a MySQL database dump in `backups/`
- `npm run restore` — restores the latest database backup from `backups/`
- `npm run fresh` — runs migrations fresh and seeds the database

Backup and restore use the Compose `mysql` service, so npm and Node do not need
their own `.env` loader or hardcoded container names. The MySQL clients use the
service's `MYSQL_USER`, `MYSQL_PASSWORD`, and `MYSQL_DATABASE` settings.
Restore selects the latest `.sql` filename from the project's `backups/`
directory and reports failures without printing a success message.
`npm run test:backup` tests restore behavior without accessing a real database.

### Dependency Updates

- `npm run upgrade:laravel` — updates Laravel framework and dependencies, clears all caches
- `npm run upgrade:npm` — checks for outdated npm packages and installs updates
- `npm run upgrade:all` — runs both Laravel and npm upgrades

### Cache & Cleanup

- `npm run clean` — clears Laravel caches, config, routes, views and framework folders
- (Runs cache:clear, config:clear, route:clear, view:clear, optimize:clear)

### Frontend Build Tools

- `npm run build:less` — compiles LESS to CSS (style.css and style.min.css)
- `npm run watch:less` — watches LESS files and auto-compiles on save
- `npm run compile_ts` — compiles TypeScript files
- `npm run watch:ts` — watches TypeScript files and auto-compiles on save
- `npm run sprites` — generates SVG sprite assets

### Typical workflow

1. `npm run dev` — starts Vite dev server (predev hook auto-starts Docker)
2. Work on frontend code in `resources/` and PHP code in `app/`
3. Use `npm run lint`, `npm run format`, and `npm run test` during development
4. `npm run build` when ready for production
5. `npm run backup:db` before major schema changes

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
