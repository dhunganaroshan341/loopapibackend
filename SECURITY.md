# Security

This document outlines the recommended security measures for Loop API backend.

- Authentication: Use Laravel Sanctum with cookie-based authentication for SPA frontends. This enables secure, same-site cookies and CSRF protections.
- Transport: Enforce HTTPS (TLS) in production; set `SESSION_SECURE_COOKIE=true` and `SANCTUM_STATEFUL_DOMAINS` appropriately.
- CSRF: Use the built-in Laravel CSRF protections for stateful authentication flows.
- Rate limiting: Apply per-user and per-endpoint throttling via Laravel rate limiter to prevent abuse.
- Input validation: All user-submitted JSON must be validated server-side and sanitized.
- Permissions: Use role-based access control (roles + permissions) and gate checks.
- Secrets: Keep `.env` out of source control; use secret managers in production.

If you'd like, I can add automated security checks (e.g., Dependabot, static analysis) next.
