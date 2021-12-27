up:
	docker-compose up -d
build:
	docker-compose build --no-cache --force-rm
laravel-install:
	docker-compose exec app composer create-project --prefer-dist laravel/laravel .
create-project:
	mkdir -p end
	@make build
	@make up
	@make laravel-install
	docker-compose exec app php artisan key:generate
	docker-compose exec app php artisan storage:link
	docker-compose exec app chmod -R 777 storage bootstrap/cache
	@make fresh
install-recommend-packages:
	docker-compose exec app composer require doctrine/dbal
	docker-compose exec app composer require --dev ucan-lab/laravel-dacapo
	docker-compose exec app composer require --dev barryvdh/laravel-ide-helper
	docker-compose exec app composer require --dev beyondcode/laravel-dump-server
	docker-compose exec app composer require --dev barryvdh/laravel-debugbar
	docker-compose exec app composer require --dev roave/security-advisories:dev-master
	docker-compose exec app php artisan vendor:publish --provider="BeyondCode\DumpServer\DumpServerServiceProvider"
	docker-compose exec app php artisan vendor:publish --provider="Barryvdh\Debugbar\ServiceProvider"
init:
	docker-compose up -d --build
	docker-compose exec app composer install
	docker-compose exec app cp .env.example .env
	docker-compose exec app php artisan key:generate
	docker-compose exec app php artisan storage:link
	docker-compose exec app chmod -R 777 storage bootstrap/cache
	@make fresh
remake:
	@make destroy
	@make init
stop:
	docker-compose stop
down:
	docker-compose down --remove-orphans
restart:
	@make down
	@make up
ps:
	docker-compose ps

front:
	docker-compose exec front sh
api:
	docker-compose exec api sh
migrate:
	docker-compose exec api php artisan migrate
fresh:
	docker-compose exec api php artisan migrate:fresh --seed
seed:
	docker-compose exec api php artisan db:seed

npm:
	@make npm-install
npm-install:
	docker-compose exec front npm install
npm-dev:
	docker-compose exec front npm run dev

yarn:
	docker-compose exec front yarn
yarn-install:
	@make yarn
yarn-dev:
	docker-compose exec front yarn dev

db:
	docker-compose exec db bash
db2:
	docker-compose exec db2 bash
sql:
	docker-compose exec db bash -c 'mysql -u $$MYSQL_USER -p$$MYSQL_PASSWORD $$MYSQL_DATABASE'
redis:
	docker-compose exec redis redis-cli
ide-helper:
	docker-scompose exec api php artisan clear-compiled
	docker-scompose exec api php artisan ide-helper:generate
	docker-scompose exec api php artisan ide-helper:meta
	docker-scompose exec api php artisan ide-helper:models --nowrite

cache:
	docker-compose exec api php artisan cache:clear
	docker-compose exec api php artisan route:clear
