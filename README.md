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
Desafio Técnico - Backend PHP 2023

Este é o desafio para a vaga de Backend PHP e consiste na entrega de uma API Restful
escrita em PHP e usando o framework LARAVEL (8 ou superior), bem como, banco de
dados MySQL 8. O prazo para este desafio é de 3 dias, e neste dia deverão ser entregues
os códigos fontes para análise via GitHub para rodrigo.warzak@terceirizados.farmarcas.com.br.
Pontos que serão avaliados e considerados:
● Conhecimento e uso de recursos do LARAVEL;
● Organização e documentação do código;
● Lógica de programação e nível de abstração;
● Uso do conceito SOLID;
● Uso de testes unitários (PHPUnit);
● Uso de PSR;
● Uso de recursos uma API Restful;
● Uso de recursos de SQL (MySQL).
Regras:
● A API deverá atender um módulo de agenda (CRUD);
● Sabemos que uma agenda é composta por diversas atividades, e que possuem uma
data de início, data de prazo, data de conclusão e um status(aberto/concluído), bem
como possui um título, um tipo (que podem ser customizados), uma descrição e um
usuário responsável (pode-se usar Laravel Sanctum para os usuários);
● Deve existir opção de filtrar as atividades por range de data, ex.: do dia 21/12/2022
até 10/01/2025;
● O banco deverá ser criado utilizando migrations;
● O projeto deve conter testes automatizados com PHPUnit;
● A documentação da API deve ser feito via Swagger;
● Não poderá permitir cadastros na mesma data ou que se sobreponham a outras
datas de atividades de um mesmo usuário;
● Não poderá permitir o registro de datas em finais de semana;
● Caso você seja selecionado, marcaremos uma data para a revisão em conjunto do
código entregue.

BOA SORTE!