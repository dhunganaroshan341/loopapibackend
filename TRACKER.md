# Loop API - Project Tracker

Purpose: a running log of features, fixes, module status, and action items.

Format for entries:
- Date: YYYY-MM-DD
- Module: (Auth | API Management | Submissions | Roles | Docs | DevOps | CI)
- Type: (Added | Updated | Fixed | TODO)
- Description: short summary
- Files: list of key files changed
- Status: (done | in-progress | blocked)
- Notes: details, blockers, follow-ups

---

## Log

- Date: 2026-06-06
  - Module: Docs / Scaffold
  - Type: Added
  - Description: Initial repository scaffold, docs and architecture files added.
  - Files: `README.md`, `SECURITY.md`, `DATABASE.md`, `ARCHITECTURE.md`
  - Status: done
  - Notes: Basic project description and setup steps written.

- Date: 2026-06-06
  - Module: DevOps / Docker
  - Type: Added
  - Description: Dockerfile and `docker-compose.yml` added for PHP 8.2 and MySQL.
  - Files: `Dockerfile`, `docker-compose.yml`, `.env.example`
  - Status: done
  - Notes: DB service name `db` used in `.env.example` (requires `docker compose up -d`).

- Date: 2026-06-06
  - Module: Auth / Framework
  - Type: Updated
  - Description: Laravel 12 project files merged; `composer.json` updated and dependencies installed. Sanctum published.
  - Files: `composer.json`, vendor/*, `config/sanctum.php`, `database/migrations/*` (sanctum)
  - Status: done
  - Notes: `php artisan migrate` failed locally because DB host `db` is not reachable; run Docker or adjust `.env` to connect to your DB.

- Date: 2026-06-06
  - Module: Auth
  - Type: Updated
  - Description: Replaced custom registration/login with Laravel Breeze API scaffolding. Removed custom `AuthController` to avoid conflicts.
  - Files: `routes/api.php`, `config/sanctum.php`, `database/migrations/*` (breeze), `app/Http/Controllers/*` (breeze)
  - Status: done
  - Notes: Breeze attempted to run migrations but DB is unavailable; migrations can be run after DB is available.

- Date: 2026-06-06
  - Module: Git / Repo housekeeping
  - Type: Updated
  - Description: Backend `.gitignore` expanded to ignore vendor, node_modules, envs, editor settings, build artifacts.
  - Files: `.gitignore`
  - Status: done
  - Notes: Keep secrets out of repo.

---

## Pending / TODOs

- Implement role & permission models, middleware and migrations (in-progress)
- Add `api_clients`, `api_endpoints`, and `submissions` migrations and models
- Implement endpoint schema validation and submission storage
- Add API rate-limiting and usage logging
- Add unit tests for auth and submission flows
- CI: add GitHub Actions for tests and security scans

---

## How to use

- Add a new log entry whenever you add or change important behavior.
- For blocking issues, set Status: blocked and include reproduction steps in Notes.
