# Tedia-investisment

Plateforme web d’**investissement et de location immobilière**, basée sur Laravel. Interface entièrement en **français**.

## Fonctionnalités principales

- Authentification utilisateurs et administration dédiée
- Gestion des villes et sous-zones
- Annonces immobilières (administration et dépôt par les utilisateurs)
- Galerie multi-images, liste de souhaits, recherche
- Blog, bons de réduction, newsletter, contact
- Paiement en ligne (SSL Commerz), commandes et rapports
- Paramètres du site et sauvegarde de base de données

## Prérequis

- PHP 7.4 ou 8.0
- Composer
- Node.js et npm (assets front)

## Installation

```bash
git clone <votre-depot>
cd HouseRental
cp .env.example .env
```

Configurer la base de données et `APP_NAME="Tedia-investisment"` dans `.env`, puis :

```bash
composer install
php artisan key:generate
php artisan migrate
npm install
npm run dev
```

Lancer le serveur de développement (`php artisan serve`) ou configurer votre hôte web (par ex. `public/` comme racine).

## Avec Docker

Prérequis : [Docker Desktop](https://www.docker.com/products/docker-desktop/) (Windows / Mac) ou Docker Engine + Compose sur Linux.

1. À la racine du projet, créer le fichier d’environnement :
   ```bash
   copy .env.docker.example .env
   ```
   (Sous Linux / macOS : `cp .env.docker.example .env`.)  
   Le mot de passe MySQL par défaut est **`secret`** (`DB_PASSWORD` dans `.env`, repris pour `MYSQL_ROOT_PASSWORD`). Le healthcheck MySQL utilise la variable du conteneur.

2. Construire et démarrer les conteneurs :
   ```bash
   docker compose up -d --build
   ```

3. Initialiser Laravel (clé + migrations + lien storage) :
   ```bash
   docker compose exec app php artisan key:generate
   docker compose exec app php artisan migrate
   docker compose exec app php artisan storage:link
   ```

4. Compiler les assets front (une fois) :
   ```bash
   docker compose run --rm node
   ```
   Pour régénérer à chaque modification : `docker compose run --rm node sh -c "npm install && npm run watch"` (laisser le terminal ouvert).

5. Ouvrir l’application : **http://localhost:9080** (ou le port défini par `APP_PORT` dans `.env`).  
   Si une autre application utilise déjà ce port sur votre PC, changez `APP_PORT` et `APP_URL` (même numéro de port) puis relancez `docker compose up -d`.  
   MySQL est exposé sur le port **3307** de la machine hôte (`localhost:3307`).

Variables utiles dans un fichier `.env` à la racine (lue par Compose) : `APP_PORT` (défaut 9080), `MYSQL_PORT` (défaut 3307), `DB_DATABASE`, `DB_PASSWORD`.

## Nom du projet

Le produit et la marque affichés sont **Tedia-investisment**. Le nom d’application par défaut est défini dans `config/app.php` et via `APP_NAME` dans `.env`.

## Langue

La locale par défaut est le **français** (`fr`), avec fichiers dans `resources/lang/fr/`.

## Zone géographique & monnaie

- **Pays cible** : Togo (fuseau horaire par défaut : `Africa/Lome` via `APP_TIMEZONE`).
- **Devise** : **FCFA** (code ISO **XOF**), configurable avec `APP_CURRENCY` et `APP_CURRENCY_CODE` dans `.env`.

> **Paiement en ligne** : l’exemple SSLCommerz fourni est historiquement orienté Bangladesh / BDT. Les montants affichés sont en FCFA ; pour encaisser réellement en XOF au Togo, prévoyez un prestataire local (Mobile Money, carte, etc.) et adaptez le contrôleur de paiement.
