# Teste de avaliação Alibin Full Stack

Para realizar o projeto foi utilizado o Wamp server para iniciar todos os serviços do Apache e MySql assim como
a obtenção do PHP

## Requisitos:
- PHP     - 7.4 ou superior
- Apache  - 2.4 ou superior
- MySQL   - 5.7 ou superior
- MariaDB - 10.6 ou superior
- Laravel - 7x ou superior

## Instalação
- 01 - Faça o clone desse projeto
- 02 - Faça uma copia do arquivo .env.example e renomeie para .env
- 03 - Em seu banco de dados mysql crie um novo data base vazio e copie o nome do banco.
- 04 - Edite o arquivo .env inserindo as configurações do banco de dados mysql (nome do banco, usuário e senha)
- 05 - Abra o terminal de sua preferência na raiz do projeto
- 06 - Execute o comando "php artisan migrate" - esse comando irá criar as tabelas no banco.
    Caso tenha ocorrido o seguinte erro: 
   - "Syntax error or access violation: 1071 Specified key was too long; max key length is 1000 bytes"
   - siga as etapas de possivel erro mais a baixo.
- 07 - Execute o comando "php artisan db:seed" - Essa etapa é opcional (ela irá popular o banco de dados)
- 08 - Execute o comando "php artisan serve"
- 09 - Abra seu navegador e entre com o endereço gerado pelo comando a cima (127.0.0.1:8000)
- 10 - Caso tudo tenha dado certo você estará na página Principal, para acessar as páginas Clientes e Itens
     é necessário estar logado e para isso é possível fazer o registro.
     
## Possível erro de migration

Caso ocorra o erro "Syntax error or access violation: 1071 Specified key was too long; max key length is 1000 bytes"

Existem algumas soluções.

- 1 - Alterar o charset das configurações do laravel para o banco de dados
    - 1 Na raiz do projeto localize a pasta config, dentro procure pelo arquivo "database.php"
    - 2 procure as configurações do mysql e busque pelas linhas 'charset' => 'utf8mb4' e 'collation' => 'utf8mb4_unicode_ci'
    removendo de seus valores o conteúdo 'mb4' deixando essas linhas dessa forma: 'charset' => 'utf8' e 'collation' => 'utf8_unicode_ci',
    - 3 salve o arquivo, remova qualquer possível tabela já criada no banco e tente rodar o comando "php artisan migrate", novamente.
    
Caso o erro percista siga os próximos passos:

- 2 Procure o arquivo AppServiceProvider.php localizado em "app/Providers" e acrescente isto:

    -Importe o Schema.
    
    -use Illuminate\Support\Facades\Schema;
    
    Na função boot() deixe assim:
    
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
    
    -salve o arquivo, remova qualquer possível tabela já criada no banco e tente rodar o comando "php artisan migrate", novamente.
    
Ambas as soluções foram retiradas desse link: https://pt.stackoverflow.com/questions/292885/erro-laravel-migrate
