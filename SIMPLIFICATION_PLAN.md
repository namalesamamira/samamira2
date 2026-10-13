# Project Simplification Plan

## Goals

- Remove the `gulp` dependency and use `npm run` scripts wherever possible.
- Simplify or remove BrowserSync proxy fallback logic now that the `.env`/Laravel setup issue has been addressed.
- Minimize runtime and development dependencies while keeping a usable local development workflow.
- Keep the current PHP/Laravel + static asset workflow intact until replacements are verified.

## Current Problems

- `gulp` is acting as the main orchestration layer for tasks that should be ordinary npm scripts.
- BrowserSync currently contains layered fallback logic for proxy/static/PHP preview modes that exists mostly to work around an environment problem.
- The repo appears to have overlapping approaches for serving and building assets:
  - `gulp`
  - `vite`
  - legacy static/public_html serving
  - Docker-based startup scripts
- Some startup behavior is defensive in ways that hide real problems instead of surfacing them early.

## Target Direction

- Keep `npm run dev` as the main local entry point.
- Use a small set of explicit npm scripts for:
  - dev server
  - build
  - asset watch
  - cleanup
  - container startup/shutdown, if still needed
- Prefer direct tools over task wrappers when possible.
- Make backend serving deterministic by fixing `.env` and Laravel configuration rather than relying on automatic fallback chains.

## Desired Capabilities To Keep Or Add

- Laravel upgrade and update workflow.
- npm upgrade and update workflow.
- Clear all caches.
- Backup project data and configuration.
- Restore from backup.
- Linting for JavaScript, TypeScript, and PHP-adjacent project scripts.
- Tests for the application and build pipeline.
- Environment setup/reset for fresh checkouts.
- Dependency audit and pruning helpers.
- Optional health checks for local dev services.
- A single command to verify the development environment is ready.

## Recommended Phases

### Phase 1: Inventory and Replacement Map for Gulp Tasks

Completed. This inventory was used to identify the real gulp task families and convert them into explicit npm/Laravel/Vite commands.

The repo no longer relies on gulp as the active orchestration layer. The migration target is now fully expressed through direct npm scripts, Laravel commands, and small dedicated Node helpers, with the historical gulp task inventory preserved only as project history.

#### 1) Highest-priority tasks to replace first

These are the actual tasks driving local startup and asset build behavior.

- `browser-sync`
  - Purpose: starts BrowserSync with a proxy target, then falls back to a temporary PHP server or static preview in `public_html`.
  - Current problem: the task contains layered fallback logic (`proxy` -> `php -S` -> `static`) and is a legacy workaround for environment issues.
  - Replacement: use a single explicit backend mode. Preferred: `vite --host` for frontend dev, or `php artisan serve --host 0.0.0.0 --port 8000` when Laravel is the app server. BrowserSync should proxy one known-good backend URL only.
  - Classification: replace with existing tool such as Vite or Laravel Artisan; keep temporarily as a transition shim while the old startup path is retired.

- `default`
  - Purpose: top-level watch task that boots the startup sequence and watches LESS/JS assets for rebuilds.
  - Current problem: it is effectively a launcher for legacy local workflow, not a clear dev server.
  - Replacement: `npm run dev` should become the primary local startup command; rebuild/watch should be handled by Vite or a dedicated watch script.
  - Classification: replace with npm script; keep temporarily as a transition shim until all references are removed.

- `less`
  - Purpose: compiles `resources/assets/style.less` into CSS in `public_html/css` (or a WordPress theme CSS folder if detected).
  - Current behavior: runs `gulp-less`, minifies with `gulp-csso`, renames to `style.min.css`, and writes to `public_html/css`.
  - Replacement: replace with Vite-managed CSS build or a direct `lessc` step if the project still needs a plain CSS build output. If Vite owns the frontend, source should live under `resources/assets` and compiled output should be generated via `vite build` or `vite --watch`.
  - Classification: replace with existing tool such as Vite.

- `js`
  - Purpose: concatenates and transpiles JS from `resources/assets/js/*.js` into `public_html/js/main.js` and `main.head.js` and minifies them.
  - Current behavior: uses `gulp-concat`, `gulp-jshint`, `gulp-babel`, `gulp-uglify` and writes to `public_html/js`.
  - Replacement: migrate to a Vite entrypoint and bundle from JS modules or a minimal direct build script. This should stop doing the old jQuery global concatenation flow.
  - Classification: replace with existing tool such as Vite.

- `openproject`
  - Purpose: environment bootstrap for local development; starts Docker, creates `.env` if missing, runs `php artisan key:generate`, creates writable storage/cache dirs, opens VS Code, and tries to start the backend.
  - Current problem: this is a mutation-heavy startup script that hides problems instead of failing clearly.
  - Replacement: move this logic to a dedicated Node shell script or explicit npm scripts such as `setup`, `dev:bootstrap`, and `doctor`. Use direct commands like `docker compose up -d`, `php artisan key:generate`, and `mkdir -p` only when the environment check passes.
  - Classification: replace with npm script.

- `ssh`
  - Purpose: shell into the project container.
  - Replacement: `docker compose exec -u root php-apache bash` or `docker compose run --rm --user root php-apache bash`.
  - Classification: replace with npm script.

- `down`
  - Purpose: dumps MySQL, runs `git add -A`, then `docker compose down`.
  - Replacement: split into two explicit scripts: a DB backup task and a container shutdown task. Example: `npm run backup:db` + `docker compose down`.
  - Classification: replace with npm script.

#### 2) Asset and dependency migration tasks

- `update_js`
  - Purpose: copies vendor JS/CSS files from `node_modules` into the public asset folders based on flag variables in `gulp/config.js`.
  - Current behavior: this is a manual dependency harvesting script for jQuery, slick, validate, colorbox, dropzone, etc.
  - Replacement: import frontend libraries directly in Vite or import them from `resources/assets/js` when needed; do not copy from `node_modules` into `public_html` manually.
  - Classification: replace with existing tool such as Vite.

- `npmUpgrade`
  - Purpose: runs `npm update` to refresh packages.
  - Replacement: use `npm install`, `npm outdated`, and `npm update` as normal npm workflow; no gulp wrapper needed.
  - Classification: replace with npm script.

- `create_sprites`
  - Purpose: generates sprite assets from Font Awesome SVGs and moves them to `public_html/img`.
  - Current behavior: runs a multi-step sequence with `clear-folder`, `font-svg`, `render-sprites`, `move-sprites`, and `open-css`.
  - Replacement: replace with a dedicated Node script or direct SVG generation tool (`font-awesome-svg-png`, `svg-sprite`, or a small script). Keep the output path explicit and do not call it via gulp.
  - Classification: replace with npm script.

- `randomquote`
  - Purpose: schedules a `notify` call with rotating motivational quotes.
  - Current value: non-essential notification loop; unrelated to the build or app startup path.
  - Replacement: remove entirely; if a quote helper is wanted, make it a one-off script or a dev-only notification tool outside the main build system.
  - Classification: remove entirely.

#### 3) Git, backup, and maintenance tasks

These are straightforward shell wrappers that should become direct commands or tiny dedicated scripts.

- `commit`, `status`, `init`, `gitsetup`, `push`
  - Purpose: git status, git init, git add/commit, and push logic.
  - Replacement: use direct git commands or `npm run git:status`, `npm run git:commit`, `npm run git:push` wrappers. Keep them explicit and remove gulp dependency.
  - Classification: replace with npm script.

- `zipfiles`, `notifyAdmin`, `gitbackup`
  - Purpose: placeholder tasks with no real implementation.
  - Replacement: remove entirely unless a real backup workflow is later defined.
  - Classification: remove entirely.

- `fetchrss`, `slackMessage`, `timeout`
  - Purpose: RSS polling, Slack notifications, and a delayed loop for a background sync workflow.
  - Current value: not part of the local dev workflow and not stable enough for day-to-day use.
  - Replacement: remove or re-implement as one-off scripts if a real integration is still needed.
  - Classification: remove entirely.

- `newProject`, `prune`, `projectname`, `upload`, `delete`, `ls`
  - Purpose: scaffold, prune, project metadata, upload copies, shell echo/file listing, and destructive cleanup.
  - Current value: mostly one-off prototype tooling or abandoned scaffolding scripts.
  - Replacement: remove these from the active dev workflow. If a project bootstrap script is still required, reintroduce it as a clear, intentionally named helper script instead of a gulp task.
  - Classification: remove entirely.

- `naturaldocs`
  - Purpose: documentation generation via `naturaldocs`.
  - Replacement: make this a direct script or optional command, not a gulp task.
  - Classification: replace with npm script.

#### 4) Testing and QA tasks

- `phpunit`
  - Purpose: runs PHPUnit with a coverage report.
  - Replacement: use `php artisan test` or `vendor/bin/phpunit` directly.
  - Classification: replace with existing tool such as Laravel Artisan.

- `test`
  - Purpose: placeholder test orchestration that launches Lighthouse and a browser-based benchmark.
  - Replacement: use a real QA script such as `npm run test`, `npm run test:e2e`, and `php artisan test` with explicit commands.
  - Classification: replace with npm script.

- `lighthouse`
  - Purpose: runs Lighthouse against a local URL.
  - Replacement: use `npx lighthouse http://localhost:...` directly.
  - Classification: replace with npm script.

- `dusk`
  - Purpose: runs Laravel Dusk browser tests.
  - Replacement: `php artisan dusk` directly or a composer/npx script wrapper.
  - Classification: replace with existing tool such as Laravel Artisan.

- `cypress`
  - Purpose: starts Cypress UI tests.
  - Replacement: `npx cypress open` or `npx cypress run` directly; no gulp wrapper needed.
  - Classification: replace with npm script.

#### 5) Short list of tasks that should be retained only during migration

These are not final state; they are only transitional wrappers to keep the current workflow alive until the replacements are verified.

- `browser-sync`
- `default`
- top-level `gulp` script in `package.json`

Once `npm run dev`, `npm run build`, `npm run test`, and the startup scripts are verified, these can be removed and the gulp dependency can be dropped from `devDependencies`.

#### 6) Replacement priority order

1. `browser-sync` and `default`
2. `less` and `js`
3. `openproject` and `ssh`
4. `down`
5. `create_sprites`
6. `phpunit` / `test` / `lighthouse` / `dusk` / `cypress`
7. Git, backup, and cleanup wrappers
8. Dead/demo/prototype tasks

#### 7) Concrete migration outcome

The end state should not contain a general-purpose `gulp` task runner for local development. The project should have explicit npm scripts such as:

- `dev`
- `build`
- `watch`
- `doctor`
- `setup`
- `clean`
- `test`
- `test:e2e`
- `backup`
- `backup:db`
- `down`
- `ssh`
- `git:status`
- `git:commit`
- `git:push`

This is the replacement inventory to use for the next implementation pass. It captures the real task names, what each task does, and the migration bucket each one belongs to.

### Phase 2: Replace Orchestration with npm Scripts

Completed. The active project flow is now defined through explicit npm scripts and targeted Node helpers instead of a general-purpose gulp runner.

Current supported scripts include:

- `dev`
- `serve`
- `build`
- `watch`
- `dev:sync`
- `dev:proxy`
- `setup`
- `doctor`
- `ci`
- `backend:up`
- `backend:down`
- `down`
- `ssh`
- `clean`
- `lint`
- `test`
- `backup`
- `restore`
- `cache:clear`
- `cache:reset`
- `upgrade:laravel`
- `upgrade:npm`

The implementation follows the original direction:

- Vite is the frontend dev/build tool.
- Laravel-native commands handle cache and app state.
- Docker Compose is used only as an explicit backend service command.
- Small Node scripts handle environment bootstrap, health checks, and backup restore.
- Backup and restore scripts are intentionally simple and symmetric.

### Phase 2b: Upgrade And Maintenance Workflows

Completed. The repo now includes explicit upgrade and maintenance commands:

- `upgrade:laravel`
- `upgrade:npm`
- `upgrade:all`
- `cache:clear`
- `cache:reset`
- `clean`
- `restore`
- `doctor`

These cover the intended maintenance workflow and make local recovery and upgrade actions explicit rather than hidden inside gulp tasks.

### Phase 3: Eliminate Gulp

Completed. The active gulp task runner, task directory, and gulp package references have been removed from the running project.

Current state:

- `gulpfile.js` removed
- `gulp/` directory removed
- gulp packages removed from `devDependencies`
- project docs and helper scripts updated to prefer the npm/Laravel/Vite workflow
- legacy references remain only in the project history and migration notes, not in active execution paths

### Phase 4: Reduce Dependency Surface

Completed for the active project dependency set. The legacy gulp ecosystem was removed along with the task helpers it depended on.

Remaining work is now limited to normal package maintenance and one-off dependency hygiene rather than migration from gulp.

The repository is now aligned with a leaner toolchain:

- Vite for frontend build/watch
- Laravel for framework/runtime tasks
- Node helpers for local environment checks and backups
- no active gulp dependency path

### Phase 6: Clean Up Environment and Startup

Completed in principle for the active repo workflow. The project now includes a committed `.env.example`, explicit setup logic, and separate tool entry points for frontend work, backend work, and maintenance.

The resulting startup model is simpler and clearer:

- keep Docker startup separate from frontend execution
- require explicit environment setup through `npm run setup`
- check readiness through `npm run doctor`
- avoid hidden mutation chains during startup
- keep local dev instructions short and reproducible

## Other Opportunities

- Replace ad-hoc shell commands with small Node scripts where logic is non-trivial.
- Avoid mutating project files during startup if the same effect can be documented or committed once.
- Remove duplicate build/watch paths if both `resources/assets` and `public_html` are being watched for the same reason.
- Consolidate asset output locations so there is a single source of truth for frontend files.
- If the project is now Laravel-first, consider whether `public_html` is still necessary as a public runtime surface or whether a standard `public/` layout would reduce confusion.
- Add a `ci`-style validation script that chains lint, test, and build checks.
- Add dependency hygiene checks such as outdated packages, duplicate packages, and unused packages.
- Add a minimal release/build script if deployments still happen manually.

## Validation Checklist

- `npm run build` produces the expected assets.
- Browser opening is optional and does not block startup.
- The backend loads without implicit fallback hacks.
- The repo no longer depends on gulp for day-to-day development.
- Fresh checkout instructions are short and reproducible.
- `npm run lint` passes.
- `npm run test` passes.
- `npm run cache:clear` leaves the app in a usable state.
- `npm run backup` and `npm run restore` are inverse operations.
- `npm run doctor` reports missing prerequisites clearly.
- Laravel and npm upgrade paths are documented.

## Suggested Order of Work

1. Inventory the current scripts and task usage.
2. Replace the highest-value gulp tasks with npm scripts.
3. Simplify BrowserSync to one mode.
4. Verify local dev boot without fallback logic.
5. Remove gulp packages and files.
6. Re-run install/build/dev validation.
