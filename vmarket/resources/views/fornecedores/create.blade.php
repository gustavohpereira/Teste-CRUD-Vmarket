<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Fornecedor</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-gray-100 text-gray-800">
    <x-header />
    <div class="container mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold mb-6 text-center text-blue-600">Criar um Fornecedor</h1>

        <form action="{{ route('fornecedores.store') }}" method="post" class="bg-white rounded-lg shadow p-6">
            @csrf

            <div class="mb-4">
                <label for="nome" class="block text-gray-700 font-semibold mb-2">Nome:</label>
                <input type="text" id="nome" name="nome" required class="block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold mb-2">Email:</label>
                <input type="email" id="email" name="email" required class="block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="cnpj" class="block text-gray-700 font-semibold mb-2">CNPJ:</label>
                <input type="text" id="cnpj" name="cnpj" required class="block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="categoria" class="block text-gray-700 font-semibold mb-2">Categoria:</label>
                <input type="text" id="categoria" name="categoria" required class="block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="uf" class="block text-gray-700 font-semibold mb-2">UF:</label>
                <input type="text" id="uf" name="uf" maxlength="2" required class="block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="telefone" class="block text-gray-700 font-semibold mb-2">Telefone:</label>
                <input type="text" id="telefone" name="telefone" class="block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white font-semibold rounded-lg p-2 hover:bg-blue-700 transition">
                Cadastrar Fornecedor
            </button>
        </form>
    </div>
</body>
</html>
