<div align="center">
	<h1>BONSAE - Teste prático </h1>
</div>
O objetivo desse projeto é criar um sistema CRUD em Laravel para gerenciar produtos de um supermercado.

## ⚙️ Tecnologias usadas

Antes de começar, verifique se você atendeu aos seguintes requisitos:

-   [ Laravel 10 ](https://laravel.com/) - php: "^8.1";
-   [ MySQL](https://www.mysql.com/);

## 🚀 Iniciando a aplicação localmente

### Para iniciar o projeto, siga estas etapas:

1.  Clone esse repositório;
2.  Execute o comando:  
```bash
composer install
```
3. Crie o env da aplicação e configure a conexão com o banco de dados;
4. Execute o comando para criar key da aplicação:  
```bash
php artisan key:generate
```
5. Execute o comando para criar as tabelas no banco de dados
```bash
php artisan migrate
``` 
6. Execute o comando para criar um exemplo de produto no banco de dados:
```bash
php artisan db:seed
``` 
7. Execute o comando para iniciar a aplicação:
```bash
php artisan serv
``` 
