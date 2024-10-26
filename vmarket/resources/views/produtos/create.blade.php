<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Produto</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body>
    <h1>Criar um Produto</h1>

    <form action="{{ route('produtos.store') }}" method="POST">
        @csrf
        @method('POST')

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
        <br><br>

        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao"></textarea>
        <br><br>

        <label for="preco">Preço:</label>
        <input type="number" id="preco" name="preco" step="0.01" required>
        <br><br>

        <label for="fornecedor_id">Fornecedor:</label>
        <select id="fornecedor_id" name="fornecedor_id" required>
            <option value="">Selecione um fornecedor</option>
            @foreach($fornecedores as $fornecedor)
                <option value="{{ $fornecedor->id }}">{{ $fornecedor->nome }}</option>
            @endforeach
        </select>
        <br><br>

        <button type="submit">Cadastrar Produto</button>
    </form>
</body>

</html>
