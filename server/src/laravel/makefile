.PHONY:=  db-migrate db-refresh clear-caches

db-migrate:
	docker-compose exec php php artisan migrate
db-refresh:
	docker-compose exec php php artisan migrate:fresh --seed
clear-caches:
	php artisan route:clear
	php artisan config:clear
	php artisan cache:clear
	composer dump-autoload
