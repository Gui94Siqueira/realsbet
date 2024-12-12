# Projeto Laravel

Este é um projeto desenvolvido com o framework Laravel. Abaixo estão as instruções para configurar e executar o projeto localmente.

## Pré-requisitos

Antes de começar, você precisará de:

- [PHP](https://www.php.net/) (versão 8.x ou superior)
- [Composer](https://getcomposer.org/) (gerenciador de dependências PHP)
- [MySQL](https://www.mysql.com/) ou [MariaDB](https://mariadb.org/) (banco de dados)
- [Node.js](https://nodejs.org/) (para compilação de assets frontend)

## Instalação

Siga os passos abaixo para configurar o ambiente local do projeto:

### 1. Clone o repositório

```bash
git clone https://github.com/Gui94Siqueira/realsbet.git
cd realsbet

composer install

cp .env.example .env


APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:chave-gerada-do-app-key
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario
DB_PASSWORD=senha


php artisan key:generate


php artisan migrate

npm install

npm run dev

php artisan serve
