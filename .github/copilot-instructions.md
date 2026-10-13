This repository is a Laravel application with an npm-first local workflow and a Vite-based frontend build pipeline.

Project structure and workflow:
- Treat Laravel application files as the primary app source of truth.
- Treat `public_html` as the public runtime surface for legacy static assets and compatibility layers.
- Treat `resources` as the app frontend source when working on views and bundled frontend assets.
- Use Vite for frontend development and production builds through `npm run dev`, `npm run build`, and `npm run watch`.
- Use Laravel-native commands for backend bootstrapping, cache clearing, and app maintenance.
- Treat the old gulp tasks as legacy transition shims only; do not add new work to them.

Editing guidance:
- Prefer source edits under `resources/` or Laravel app files instead of hand-editing generated public assets.
- Keep public-facing changes working with the existing PHP/Laravel + static asset structure.
- Preserve the existing plain PHP, HTML, vanilla JavaScript/jQuery approach. Do not introduce a frontend framework unless explicitly requested.
- Reuse the existing partial structure in `public_html/includes` for shared layout fragments.
- Keep changes small and consistent with the existing naming, formatting, and file organization.

Build expectations:
- Use `npm run dev` for frontend development.
- Use `npm run build` for production asset bundling.
- Use `npm run watch` for live rebuilds during local development.
- Use Laravel commands such as `php artisan serve`, `php artisan cache:clear`, and `php artisan test` for backend operations.

When implementing UI changes:
- Check whether the requested change belongs in a reusable include, a page in `public_html`, or a Laravel view/resource file.
- Preserve responsive behavior and avoid unnecessary structural rewrites.
- Prefer existing libraries already present in the project, such as jQuery-based utilities, before adding new dependencies.

When in doubt:
- Prefer the explicit npm/Laravel workflow over legacy gulp automation.
- Keep public-facing pages working without requiring a framework build beyond the current Vite/Laravel setup.