Requisitos:

VSCODE
XAMPP
COMPOSER
NODE.JS - LTS

(Executar todos com privilégios de administrador)

------------------------------------------------------------

Criação do Projeto:

1 - Instalação do Projeto Laravel
1.1 composer create-project laravel/laravel:^8.0 crud-alunos

2 - Configurar Banco de dados
2.1 Executar o Xampp como administrador
2.2 Ativar o Apache e o MySQL
2.3 Abrir o navegador e digitar http://localhost/phpmyadmin
2.4 Criar o banco de dados: db_alunos; utf8_general_ci
2.5 Configurar arquivo .env:
	DB_CONNECTION=mysql
	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE=db_alunos
	DB_USERNAME=root
	DB_PASSWORD=

3 - Configuração do Projeto - Backend
3.1 Criar model Alunos: php artisan make:model Aluno -m
3.2 Configurar migration crate_alunos_table:
	$table->string('nome')->nullable();
      $table->string('email')->nullable();
3.3 Configurar model Aluno:
	protected $fillable = [
        'nome', 'email'
      ];
3.4 Executar a migration: php artisan migrate
3.5 Criar controller: php artisan make:controller AlunosController
3.6 Desenvolver os métodos do controller
3.7 Criar as rotas da view
3.8 Criar as rotas da api

4 - Configuração do Projeto - Frontend
4.1 Abrir terminal
4.2 Instalar o Laravel Vue UI
4.2.1 composer require laravel/ui
4.2.2 php artisan ui vue
4.2.3 npm install
4.2.4 npm run watch
4.2.5 npm install vue-router vue-axios (Pacotes responsáveis por consumir a api)*****


5 - Iniciar o Vue
5.1 Ir até pasta "resources/views"
5.2 Criar a pasta dashboard
5.3 Criar o arquivo: app.blade.php

6 - Criação dos componentes do CRUD
6.1 Ir até pasta "resources/js"
6.2 Criar o arquivo: app.vue
6.3 Ir até a pasta ""resources/js/components"
6.4 Criar a pasta alunos
6.5 Criar o arquivo: index.vue
6.6 Criar o arquivo: create.vue
6.7 Criar o arquivo: edit.vue

7 - Criar vue rotas do crud 
7.1 Ir até pasta "resources/js"
7.2 Criar o arquivo: routes.js

8 - Adicionar dependências no arquivo app.js


	
	



