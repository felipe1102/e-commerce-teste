## Sistema
Para realizar a instalação do sistema em sua maquina rode os seguintes comandos na pasta do projeto
<br>Para instalação de dependencias.
<br> composer install 

Banco de dados.
<br> Crie um schema em seu banco de dados com o nome e-commerce-db.
<br>duplique o arquivo .env.example e renomeie para .env

<br>rode o comando para gerar a chave da aplicação
<br>php artisan key:generate

<br>rode o comando: 
<br>php artisan migrate



## end points produtos

<br>GET '/' => Abre a tela de listagem dos produtos
<br>GET '/products' => Lista os produtos cadastrados no sistema.
<br>GET '/product/{id}' => Visualiza um produto.
<br>GET '/products/register' => Abre a tela para realizar registro de um novo produto.
<br>POST '/product/register' => Registra um novo produto.
<br>POST '/product/update' => Realiza a alteração em uma produto.
<br>GET '/product/delete/{id}' => Deleta um produto.


## end points varegista
<br>GET '/retailers' => lista os varegistas cadastrados no sistema.
<br>GET '/retailer/list' => Abre a tela de listagem dos varegistas.
<br>GET '/autocomplete/fetch' => Realiza uma busca baseada no nome digitado para gerar um input com autocomplete com os varegistas cadastrados.
<br>GET '/retailer/register' => Abre a tela para realizar um cadastro de varegista.
<br>POST '/retailers/register' => Abre a tela para realizar o registro de um varegista.
<br>POST '/retailer/update' => Realiza a alteração em uma varegista.
<br>GET '/retailer/{id}' => Visualiza um varegista.

