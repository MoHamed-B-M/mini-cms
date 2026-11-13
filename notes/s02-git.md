# Session 02 - Git et GitHub

Réponses rédigées avec mes propres mots, puis comparées au corrigé de la page.

## 1. Index et commit

Réponse : `git add` fait passer un fichier du répertoire de travail à l'index ; `git commit` enregistre l'index dans le dépôt local. `git push` envoie ensuite les commits au dépôt distant.

## 2. Branche et tag

Réponse : une branche avance à chaque commit ; un tag reste fixé sur un seul commit (`lab-01` désigne toujours la fin de la session 01).

## 3. Le fichier .env

Réponse : `.env` contient `APP_KEY` et les réglages propres au poste (et des secrets en production). On copie `.env.example` puis on lance `php artisan key:generate`.

## 4. Le dossier vendor/

Réponse : `vendor/` est volumineux et entièrement généré ; `composer install` le reconstruit avec les versions exactes de `composer.lock`.

## 5. Git Credential Manager

Réponse : Git Credential Manager range le jeton dans le Gestionnaire d'identification Windows (entrée `git:https://github.com`). On le supprime sur un poste de l'université, car la personne suivante pourrait pousser en votre nom ; on le garde sur son ordinateur personnel.

## 6. Historique depuis lab-01

Nombre de commits depuis lab-01 : 6 (notes, page a-propos, capture, README, documentation des routes, notes historique).

Fichiers modifiés depuis lab-01 : notes/s02-git.md, routes/web.php, resources/views/a-propos.blade.php, screenshots/s02-a-propos.png, README.md.

Ce que git tag -n affiche pour lab-01 : lab-01 suivi du message du commit qu'il désigne (lab-01).