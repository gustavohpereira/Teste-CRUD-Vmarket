<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Fornecedor</title>
</head>

<body>
    <h1>Criar um Fornecedor</h1>

    <form action="{{ route('fornecedores.store') }}" method="post">

        @csrf
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
        <br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br><br>

        <label for="cnpj">CNPJ:</label>
        <input type="text" id="cnpj" name="cnpj" required>
        <br><br>

        <label for="categoria">Categoria:</label>
        <input type="text" id="categoria" name="categoria" required>
        <br><br>

        <label for="uf">UF:</label>
        <input type="text" id="uf" name="uf" maxlength="2" required>
        <br><br>

        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone">
        <br><br>

        <button type="submit">Cadastrar Fornecedor</button>
    </form>
</body>

</html>
