# recordar de cambiar el archivo .env sobretodo el debug y la base de datos
npm run dev
composer install --optimize-autoloader --no-dev
php artisan config:cache
php artisan route:cache
php artisan view:cache
