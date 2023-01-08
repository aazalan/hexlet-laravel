start:
	php artisan serve & npm run dev && fg

setup:
	composer install
	cp -n .env.example .env
	php artisan key:gen --ansi
	touch database/database.sqlite
	php artisan migrate
	php artisan db:seed --class=DatabaseSeeder
	npm install @rails/ujs