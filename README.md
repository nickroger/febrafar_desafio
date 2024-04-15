# Febrafar - Desafio Técnico - Backend PHP 2023

## Passo a passo para rodar o projeto
Clone o projeto
```sh
git clone https://github.com/nickroger/febrafar_desafio.git febrafar_desafio
```
```sh
cd febrafar_desafio/
```


Crie o Arquivo .env
```sh
cp .env.example .env
```


Atualize essas variáveis de ambiente no arquivo .env
```dosini
APP_NAME="Febrafar - Desafio Técnico - Backend PHP 2023"
APP_KEY=
APP_URL=http://localhost:8989

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=root

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379

L5_SWAGGER_GENERATE_ALWAYS=true
L5_SWAGGER_CONST_HOST=http://localhost:8989/api
```


Suba os containers do projeto
```sh
docker-compose up -d
```


Acesse o container
```sh
docker-compose exec app bash
```


Instale as dependências do projeto
```sh
composer install
```


Gere a key do projeto Laravel
```sh
php artisan key:generate
```

Ativar Plugin datatable
```sh
php artisan adminlte:plugins install --plugin=datatablesPlugins
```
Ativar Plugin datatable
```sh
php artisan adminlte:plugins install --plugin=datatables
```


Acesse o projeto
[http://localhost:8989](http://localhost:8989)

Acessar documentação API
[http://localhost:8989/api/documentation](http://localhost:8989/documentation)



# PDF 
<img alt="Febrafar Desafio" src="https://github.com/nickroger/febrafar_desafio/assets/3020333/a7155c71-59f5-49e9-bc64-0eaefb66dfeb">
