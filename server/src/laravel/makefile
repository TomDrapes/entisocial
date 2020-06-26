.PHONY:=  db-migrate db-refresh

db-migrate:
	docker-compose exec php php artisan migrate
db-refresh:
	docker-compose exec php php artisan migrate:fresh --seed
