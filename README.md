# Mini-CMS

Projet fil rouge de l'Atelier Framework Côté Serveur (Laravel 13, PHP 8.3+), 3e année MDW, groupe MDW33, ISET Sidi Bouzid.

Auteur : Hamma.

Mini-CMS est une petite plateforme de publication : pages publiques, back-office authentifié, API JSON et tests Pest. Chaque session se termine par un tag Git.

## État actuel

- Site web complet (posts, catégories, tags, auth, autorisations).
- API REST complète (lecture publique + CRUD protégé par Sanctum).
- 86+ tests Pest (verts).

## Prérequis

- PHP 8.3+ et Composer (extensions : curl, fileinfo, mbstring, openssl, pdo_sqlite, sqlite3, zip).
- Node.js LTS et npm.
- Git.

## Installation

```bash
git clone https://github.com/MoHamed-B-M/mini-cms.git
cd mini-cms
composer install
npm install
cp .env.example .env          # PowerShell : copy .env.example .env
php artisan key:generate
touch database/database.sqlite  # PowerShell : New-Item database\database.sqlite -ItemType File
php artisan migrate --seed
npm run build
```

## Lancer le projet

```bash
php artisan serve            # http://127.0.0.1:8000
# ou tout-en-un (app + queue + logs + Vite) :
composer run dev
```

> Si la page est sans CSS, supprimer `public/hot` puis `npm run build`.

## Comptes seedés

| Rôle | Email | Mot de passe | Accès |
|---|---|---|---|
| Admin | `test@example.com` | `password` | `/admin/*`, gestion catégories/tags, tous les articles |
| Author | (2 utilisateurs créés par la factory) | `password` | Ses propres articles, modification/suppression des siens |
| Visiteur | — | — | Lecture publique, inscription |

## Rôles et permissions

- **Visiteur** : lit les articles publiés, les catégories, les tags, l'API publique.
- **Author** : tout ce que fait le visiteur + crée/modifie/supprime **ses** articles, publie/dépublie les siens, voit "mes articles".
- **Admin** : tout ce que fait l'author + gère les catégories et tags (`/admin/*`), modifie/supprime **tous** les articles.

## CRUD — Articles (Posts)

| Action | Méthode / URI | Accès |
|---|---|---|
| Lister | `GET /posts` | public |
| Voir | `GET /posts/{post}` | public (brouillon : auteur/admin) |
| Créer (form) | `GET /posts/create` | auth |
| Enregistrer | `POST /posts` | auth + writable |
| Modifier (form) | `GET /posts/{post}/edit` | auth + auteur/admin + writable |
| Mettre à jour | `PUT/PATCH /posts/{post}` | auth + auteur/admin + writable |
| Supprimer | `DELETE /posts/{post}` | auth + auteur/admin + writable |
| Publier/dépublier | `PATCH /posts/{post}/publication` | auth + writable |
| Mes articles | `GET /mes-articles` | auth |
| Archive | `GET /posts/archive/{year}` | public |
| Par catégorie | `GET /posts/categorie/{slug}` | public |
| Par tag | `GET /posts/tag/{slug}` | public |

## CRUD — Catégories & Tags (admin)

| Action | URI | Accès |
|---|---|---|
| Lister/Créer/Modifier/Supprimer | `/admin/categories`, `/admin/tags` | auth + admin + writable |

## API REST

Préfixe `/api`. Lecture publique, écriture protégée par Sanctum.

| Méthode | URI | Description | Auth |
|---|---|---|---|
| GET | `/api/posts` | Liste paginée (`per_page`, max 50) | non |
| GET | `/api/posts/{post}` | Détail (403 si brouillon) | non |
| POST | `/api/posts` | Créer | Sanctum |
| PUT/PATCH | `/api/posts/{post}` | Modifier (auteur/admin) | Sanctum |
| DELETE | `/api/posts/{post}` | Supprimer | Sanctum |
| POST | `/api/register` | Inscription → jeton | non |
| POST | `/api/login` | Connexion → jeton | non |
| POST | `/api/logout` | Révocation du jeton | Sanctum |
| GET | `/api/user` | Utilisateur connecté | Sanctum |

Exemple d'utilisation du jeton :
```bash
curl -H "Authorization: Bearer <token>" -H "Accept: application/json" http://localhost:8000/api/posts
```

## Tester

```bash
php artisan test            # ou : composer run test
```

Couverture : CRUD articles, pages publiques, relations, taxonomie, feedback, admin catégories, erreurs, auth, autorisations, accès admin, visibilité, API (lecture/écriture/Sanctum).

## Site en lecture seule

Mettre `SITE_READ_ONLY=true` dans `.env` → les écritures renvoient 503.

## Branches & tags

- `main` : commit unique `lab-06`.
- `mini-cms` : un commit par session (02 → 15) + commit initial.
- Tags : `lab-01b`, `lab-02`, `lab-03`, `lab-06`, `lab-07`, `lab-07b`, `lab-08`.