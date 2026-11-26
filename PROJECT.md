# Mini-CMS

Mini-CMS is a Laravel 13 web application for managing blog-style articles (posts) with categories, tags, authentication, and a REST API. It was built incrementally across 15 course sessions (ISET Sidi Bouzid, MDW33).

## What it does

- **Posts**: full CRUD, publishing/unpublishing, archives by year, filtering by category/tag, pagination, "my articles" per author.
- **Taxonomy**: admin CRUD for categories and tags, N:N post-tag relation, eager loading.
- **Auth**: manual login/register, roles (author/admin), Gates & Policies (PostPolicy), middleware (`auth`, `guest`, `admin`, `writable`).
- **API REST**: public read (index/show), Sanctum-protected write (store/update/delete), API Resources, pagination, validation.
- **Validation**: Form Requests with French messages.
- **Errors**: styled 404/503 pages, JSON responses for `/api/*`.
- **Tests**: Pest (86+ tests) covering CRUD, auth, authorization, admin, API, errors.

## Stack

Laravel 13 · PHP 8.3+ · SQLite · Blade + Tailwind (Vite) · Sanctum · Pest

## Run

```bash
php artisan migrate:fresh --seed
php artisan serve          # http://127.0.0.1:8000
```

Admin account: `admin@admin.com` / `password`

## Branches

- `main` — single `lab-06` commit
- `mini-cms` — one commit per session (02–15) + initial commit

## API

Prefix `/api`. Read endpoints public; write endpoints require a Sanctum token (`POST /api/login` → token).