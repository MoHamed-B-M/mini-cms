# Mini-CMS

Mini-CMS is a Laravel 13 web application for managing blog-style articles (posts) with categories, tags, authentication, and a REST API. It was built incrementally across 15 course sessions (ISET Sidi Bouzid, MDW33).

## What it does

- **Posts**: full CRUD, publishing/unpublishing, archives by year, filtering by category/tag, pagination, "my articles" per author.
- **Taxonomy**: admin CRUD for categories and tags, N:N post-tag relation, eager loading.
- **Auth**: manual login/register, roles (author/admin), Gates & Policies (PostPolicy), middleware (`auth`, `guest`, `admin`, `writable`).
- **Admin**: user management (list, edit name/email/role, delete, no self-delete).
- **API REST**: public read (index/show), Sanctum-protected write (store/update/delete), API Resources, pagination, validation.
- **Validation**: Form Requests with French messages.
- **Errors**: styled 404/503 pages, JSON responses for `/api/*`.
- **Tests**: Pest (90+ tests) covering CRUD, auth, authorization, admin, API, errors.

## Stack

Laravel 13 · PHP 8.3+ · SQLite · Blade + Tailwind (Vite) · Sanctum · Pest

## Run

```bash
php artisan migrate:fresh --seed
php artisan serve          # http://127.0.0.1:8000
```

Admin account: `admin@admin.com` / `password`

## Branches

- `main` - single `lab-06` commit
- `mini-cms` - one commit per session (02-15) + initial commit

## API REST

Base URL: `http://127.0.0.1:8000/api`. All responses are JSON. Read endpoints are public; write endpoints require a Sanctum bearer token.

### Authentication

| Method | Endpoint | Description | Auth |
|---|---|---|---|
| POST | `/api/register` | Create account, returns token | no |
| POST | `/api/login` | Login, returns token | no |
| POST | `/api/logout` | Revoke current token | Sanctum |
| GET | `/api/user` | Authenticated user | Sanctum |

Example login:
```bash
curl -X POST http://127.0.0.1:8000/api/login \
  -H "Accept: application/json" \
  -d "email=admin@admin.com&password=password"
```
Use the returned token as `Authorization: Bearer <token>`.

### Posts

| Method | Endpoint | Description | Auth |
|---|---|---|---|
| GET | `/api/posts` | Paginated list (`?per_page=1..50`, `?category=slug`, `?tag=slug`) | no |
| GET | `/api/posts/{post}` | Detail (403 if draft, 404 if missing) | no |
| POST | `/api/posts` | Create post | Sanctum |
| PUT/PATCH | `/api/posts/{post}` | Update (author or admin) | Sanctum |
| DELETE | `/api/posts/{post}` | Delete (author or admin) | Sanctum |

### Resources

Responses use `PostResource` and `CategoryResource`:

- Post: `id, title, slug, excerpt, body, published_at, author, category, tags`.
- Category: `id, name, slug`.

### Status codes

`200` OK · `201` Created · `204` No Content · `401` Unauthenticated · `403` Forbidden · `404` Not Found · `422` Validation error.

### Notes

- Draft posts are hidden from non-authors (403 on show).
- `per_page` is validated (1-50); invalid values return 422 with French messages.
- Pagination links preserve query string (`withQueryString`).