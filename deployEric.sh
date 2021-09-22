# recordar de cambiar el archivo .env sobretodo el debug y la base de datos
npm run production
composer install --optimize-autoloader
php artisan config:cache
php artisan route:cache
php artisan view:cache
./vendor/bin/phpunit ./tests/Inbionova
