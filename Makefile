.PHONY: up down restart build logs migrate seed test bash

up:
	docker-compose up -d

down:
	docker-compose down

restart:
	docker-compose restart

build:
	docker-compose up -d --build

logs:
	docker-compose logs -f

migrate:
	docker-compose exec app php artisan migrate --force

seed:
	docker-compose exec app php artisan db:seed --force

fresh:
	docker-compose exec app php artisan migrate:fresh --seed --force

bash:
	docker-compose exec app bash
