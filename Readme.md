# Projeto Laravel


## Pré-requisitos

- [PHP](https://www.php.net/downloads.php)
- [Composer](https://getcomposer.org/download/)
- [Node.js e npm](https://nodejs.org/en/download/) 
- [MySQL](https://dev.mysql.com/downloads/)

## Configuração

1. **Clone o repositório**
   ```bash
   git clone https://github.com/seu_usuario/seu_projeto.git
   cd vmarket
2. **Instale as dependências do PHP**
    ```bash
    composer install


3. **Instale as dependências do Node**

    ```bash
    npm install


4. **Configuração do Banco de Dados**

    <br>Crie um banco de dados MySQL.<br>
    Copie o arquivo .env.example e renomeie-o para .env.<br>
    No arquivo .env, configure as informações do banco de dados:<br>

        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=nome_do_banco
        DB_USERNAME=seu_usuario
        DB_PASSWORD=sua_senha


5. **Gere a chave da aplicação**

    ```bash
    php artisan key:generate
6. **Rodando o Projeto**
Inicie o servidor de desenvolvimento do Laravel

    ```
    php artisan serve
7. **Compile os assets do Tailwind CSS com Vite**<br>
    Nota: Mantenha este comando rodando em um terminal separado para recarregar automaticamente o CSS ao fazer alterações.

    ```
    npm run dev


8. **Acesse o projeto em http://localhost:8000.**

