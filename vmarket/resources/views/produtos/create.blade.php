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
<body class="bg-gray-100 text-gray-800">
    <x-header />
    <div class="container mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold mb-6 text-center text-blue-600">Criar um Produto</h1>

        <form action="{{ route('produtos.store') }}" method="POST" class="bg-white rounded-lg shadow p-6">
            @csrf
            @method('POST')

            <div class="mb-4">
                <label for="nome" class="block text-gray-700 font-semibold mb-2">Nome:</label>
                <input type="text" id="nome" name="nome" required class="block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="descricao" class="block text-gray-700 font-semibold mb-2">Descrição:</label>
                <textarea id="descricao" name="descricao" class="block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>

            <div class="mb-4">
                <label for="preco" class="block text-gray-700 font-semibold mb-2">Preço:</label>
                <input type="number" id="preco" name="preco" step="0.01" required class="block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="fornecedor_id" class="block text-gray-700 font-semibold mb-2">Fornecedor:</label>
                <select id="fornecedor_id" name="fornecedor_id" required class="block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Selecione um fornecedor</option>
                    @foreach($fornecedores as $fornecedor)
                        <option value="{{ $fornecedor->id }}">{{ $fornecedor->nome }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white font-semibold rounded-lg p-2 hover:bg-blue-700 transition">
                Cadastrar Produto
            </button>
        </form>
    </div>
</body>
</html>
