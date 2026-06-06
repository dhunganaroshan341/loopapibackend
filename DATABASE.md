# Database design

Recommended initial schema for Loop API:

- `users` : standard Laravel users table (id, name, email, password, etc.)
- `roles` : id, name, description
- `role_user` : pivot table mapping users to roles
- `api_clients` : records for each user-created API (id, user_id, name, slug, config)
- `api_endpoints` : endpoint definitions owned by an `api_client` (method, path, schema)
- `submissions` : collected JSON submissions (api_endpoint_id, payload (json), status, created_at)

Indexes and foreign keys should be added for performance. Use JSON columns for flexible submitted payloads.

I'll provide migration skeletons next if you want me to generate them now.
