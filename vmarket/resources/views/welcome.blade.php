<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-gray-100 text-gray-800">
    <x-header />
    <div class="container mx-auto py-10 px-4">
        <h1 class="text-4xl font-bold mb-6 text-center text-blue-600">Bem-vindo Usuario</h1>
        <p class="text-center mb-8">Escolha uma das opções abaixo:</p>

        <div class="flex justify-center space-x-6">
            <a href="{{ route('produtos.index') }}" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 transition">
                Gerenciar Produtos
            </a>

            <a href="{{ route('fornecedores.index') }}" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 transition">
                Gerenciar Fornecedores
            </a>
        </div>
    </div>
</body>
</html>
