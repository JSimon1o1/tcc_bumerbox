## Introdução

Projeto voltado para a disciplina de Projeto Empreendedor I e II, a fim da conclusão de curso de Análise e
Desenolvimento de Sistemas, do Centro Universitário UNIFTEC

### Tecnologias utilizadas 

* Framework Laravel (v10)
* Docker 
* Docker Compose
* PHP
* Composer
* MySQL

### Requsitos para rodar o projeto

* Docker (Para SGBD)
* Docker compose
* PHP >= 8
* Composer
* MySQL

### Instalação para Desenvolvimento

* Clonar o repositório para um diretório de sua preferência
    * Copiar o arquivo `env.example` para `.env`
  
* Acessar a raiz do projeto e executar a partir do seu terminal:
    * `$ composer install`  

* Após finalizar as tarefas do composer rodar a geração da chave de cripografia:
    * `$ php artisan key:generate`

* Após gerar a chave:
    * `php artisan serve`
    * o acesso ficará disponíel pelar url
    * `http://localhost:8000`

### Migrações: Banco de dados
* Após os passo acima, para criação das tabelas do banco de dados.
  * Acessar a raiz do projeto e rodas a seguinte instrução
    * `php artisan migrate`
  * Assim ele irá criar as tabelas no SGDB
  * Para reverter as tabelas é so rodar a instrução
    * php `artisan migrate:rollback`

### Algumas informações adicionais
* A pasta raiz do seu projeto é chamado de `/`
* O arquivo `.env` não é submetido, e deve ser criado para configurar as suas variáveis
  * Como exemplo acesso ao banco de dados

## Tecnologia Utilizada

Documentação: [Documentation](https://laravel.com/docs)

Bootcamp: [Bootcamp](https://bootcamp.laravel.com)

Alguns artigos: [Laracasts](https://laracasts.com)

## Contribuições

A contribuição para este projeto é livre desde que aprovado o pull request.

## Licença

Este projeto educacional esta licenciado sobre [MIT license](https://opensource.org/licenses/MIT).
