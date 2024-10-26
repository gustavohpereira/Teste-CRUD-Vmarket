<!-- resources/views/produtos/edit.blade.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body>
    <h1>Editar Produto</h1>

    <form action="{{ route('produtos.update', $produto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="{{ $produto->nome }}" required>
        <br><br>

        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao">{{ $produto->descricao }}</textarea>
        <br><br>

        <label for="preco">Preço:</label>
        <input type="number" id="preco" name="preco" value="{{ $produto->preco }}" step="0.01" required>
        <br><br>

        <label for="fornecedor_id">Fornecedor:</label>
        <select id="fornecedor_id" name="fornecedor_id" required>
            @foreach ($fornecedores as $fornecedor)
                <option value="{{ $fornecedor->id }}" {{ $fornecedor->id == $produto->fornecedor_id ? 'selected' : '' }}>
                    {{ $fornecedor->nome }}
                </option>
            @endforeach
        </select>
        <br><br>

        <button type="submit">Atualizar Produto</button>
    </form>
</body>
</html>
