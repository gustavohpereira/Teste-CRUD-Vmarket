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
<body class="bg-gray-100 text-gray-800">
    <x-header />
    <div class="container mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold mb-6 text-center text-blue-600">Editar Produto</h1>

        <form action="{{ route('produtos.update', $produto->id) }}" method="POST" class="bg-white rounded-lg shadow p-6">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nome" class="block text-gray-700 font-semibold mb-2">Nome:</label>
                <input type="text" id="nome" name="nome" value="{{ $produto->nome }}" required class="block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="descricao" class="block text-gray-700 font-semibold mb-2">Descrição:</label>
                <textarea id="descricao" name="descricao" required class="block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $produto->descricao }}</textarea>
            </div>

            <div class="mb-4">
                <label for="preco" class="block text-gray-700 font-semibold mb-2">Preço:</label>
                <input type="number" id="preco" name="preco" value="{{ $produto->preco }}" step="0.01" required class="block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Fornecedores:</label>
                @foreach ($fornecedores as $fornecedor)
                    <div class="flex items-center mb-2">
                        <input type="checkbox" name="fornecedores[]" value="{{ $fornecedor->id }}" id="fornecedor-{{ $fornecedor->id }}" class="mr-2" 
                        {{ $produto->fornecedores->contains($fornecedor->id) ? 'checked' : '' }}>
                        <label for="fornecedor-{{ $fornecedor->id }}">{{ $fornecedor->nome }}</label>
                    </div>
                @endforeach
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white font-semibold rounded-lg p-2 hover:bg-blue-700 transition">
                Atualizar Produto
            </button>
        </form>
    </div>
</body>
</html>
