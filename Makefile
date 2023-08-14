run: install
	docker-compose exec app php artisan optimize:clear
	docker-compose exec app php artisan migrate
	docker-compose ps -a
	# docker-compose exec app php artisan queue:work --daemon --tries=3

build: install
	docker-compose exec app php artisan optimize:clear
	docker-compose exec app php artisan optimize
	docker-compose exec app php artisan migrate
	docker-compose ps -a
	# docker-compose exec app php artisan queue:work --daemon --tries=3

install: down
	ls .data || mkdir .data
	ls .env || cp .env.example .env
	USER=$(USER) docker-compose up -d --build
	docker-compose exec app composer install
	docker-compose exec app php artisan key:generate

seed:
	docker-compose exec app php artisan db:seed

uninstall: down
	cd ../ && rm -rf locadora-veiculos

status:
	docker-compose ps -a

down:
	docker-compose down
	docker-compose ps -a
