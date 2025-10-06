# Family Tree

**Family Tree** is build on top of [Laravel](https://laravel.com) and [Donatso - Family Chart](https://github.com/donatso/family-chart).
It aims to provide a way to add family details and provide passwordless login for family members in the tree.

> **Requires [PHP 8.4+](https://php.net/releases/)**.

## Project Setup

⚡️ Clone the project

```bash
git clone git@github.com:smnbhattarai/family-tree.git

cd family-tree

composer install
npm install
npm run build
cp .env.example .env
php artisan key:generate
php artisan migrate

php artisan serve # serve the application...
```
