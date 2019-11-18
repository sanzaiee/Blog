## Project Installation Steps
git clone https://github.com/sanzaiee/Blog
cd Blog
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed


