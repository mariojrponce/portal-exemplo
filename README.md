# Portal 'Exemplo'
É uma pagina web onde será possível adicionar atalhos dos sistemas mais utilizados por você. Na seção Anotações é possível adicionar textos de procedimentos realizados.

# Software necessários para executar o projeto
- Visual Code
- Laravel 8.x
- Git
- SQLite Studio
- 

# Clonando um projeto e instalando o Laravel

**Clone o projeto**

`git clone git@github.com:seuprojeto`

**Acesse o projeto**

`cd seuprojeto`

**Atualizar Composer**

`composer update`

**Instale as dependências e o framework**

`composer install --no-scripts`

**Copie o arquivo .env.example**

`cp .env.example .env`

**Configure o Banco em seu .env**

*Caso sqlite:*

`DB_CONNECTION=sqlite`

`DB_HOST=127.0.0.1`

`DB_PORT=3306`

`DB_USERNAME=root`

`DB_PASSWORD=root`

**Caso esteja faltando o driver PHP que o Laravel usa para trabalhar com o SQLite, vá no terminal e execute:**

`composer require doctrine/dbal`

**Crie uma nova chave para a aplicação**

`php artisan key:generate`

**Em seguida você deve configurar o arquivo .env e rodar as migrations com:**

`php artisan migrate --seed`

**Caso ocorra erros**

**Instalar plugin SQLITE**

*  instalar no terminal linux: `php-sqlite`

**Correção no php.ini**

*  Descomentar a linha *extension=pdo_sqlite* do seu **php.ini**

     `;extension=pdo_sqlite` para `extension=pdo_sqlite`





# Comandos GIT

$ git init

$ git remote add origin https://github.com/mariojrponce/portal-exemplo.git

$ git add .

$ git commit -m "Initial commit"

$ git push -u origin master

$ git pull origin master //Atualizar repositorio

$ git config --global user.name "seu-nome" //Configurar nome completo

$ git config --global user.email "seu-email" //Configurar email

# Local STORAGE LINK
Criar a pasta storage no servidor local
$ php artisan storage:link

# Para upload de arquivos em PHP local

É necessário configurar arquivos no php.ini 
1.  Abrir o arquivo php.ini utilizando o nano ou vim
1.  Pesquisar as funções *post_max_size* e *upload_max_filesize*, e definir um tamanho padrão (150MB)
1.  Salvar o arquivo php.ini

# Merge Branch to Branche

$ git checkout a (you will switch to branch a)

$ git merge b (this will merge all changes from branch b into branch a)

$ git commit -a (this will commit your changes)
