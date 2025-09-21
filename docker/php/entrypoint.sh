#!/bin/sh
set -e

chown -R www-data:www-data storage bootstrap/cache

if [ ! -d "node_modules" ]; then
    echo "Instalando dependências do NPM..."
    npm install
fi

if [ ! -f "vendor/autoload.php" ]; then
    echo "Instalando dependências..."
    composer install --no-interaction --no-progress
fi

if [ ! -f ".env" ]; then
    cp .env.example .env
    php artisan key:generate
fi

echo "Executando migrações..."
php artisan migrate --force

php artisan config:clear

echo "Inicialização concluída. Iniciando a aplicação..."
exec "$@"