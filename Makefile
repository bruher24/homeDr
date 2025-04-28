build:
	docker compoe up --build -d
	docker compose exec app composer update
	docker compose exec app composer npm i
	docker compose down

run:
	docker compose up -d
	docker compose exec -T app npm run dev

fill:
	docker compose exec app php artisan migrate
	docker compose exec app php artisan db:seed

stop:
	docker compose down
