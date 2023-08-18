# Devlight Challenge

### Prerequisites

- PHP >= 7.4
- Composer (https://getcomposer.org/)
- Node.js (https://nodejs.org/)
- npm (https://www.npmjs.com/)

### Installation


   ```bash
   git clone https://github.com/taglientinicolas/devlights.git

   composer install

   npm install

   Configure your database settings in the .env file.

   php artisan migrate --seed

   npm run dev

   php artisan serve
   ```

### Main routes

  ```bash
  GET /api/deals ->endpoint del ejercicio
  GET / -> pagina principal del ejercicio
  GET /login -> loguear al usuario
  GET /regiter -> registrase en el sitio
  GET /deals -> listado de deals
   ```
