# Architecture

High-level components

- API Backend (Laravel): handles authentication, role/permission checks, API definition CRUD, endpoint execution, validation, and storage of submissions.
- Database: MySQL for relational data and JSON columns for payloads.
- Frontend(s): third-party SPA clients will authenticate via Sanctum cookie flow and call API endpoints.

Auth flow (recommended)

1. User logs in via SPA; frontend requests `/sanctum/csrf-cookie` then posts credentials to `/login`.
2. Backend creates session cookie (HTTP-only) and Sanctum manages stateful authentication.
3. Frontend calls protected endpoints; server verifies session and roles.

Roles & permissions

- Implement role model (admin, owner, developer, readonly) and a permission layer for actions like `manage_apis`, `submit_data`, `view_submissions`.

API definitions & submissions

- Users create `api_clients` and `api_endpoints` (method, URL path, JSON schema for validation).
- Submissions are validated against stored schemas and stored in `submissions` for auditing.
