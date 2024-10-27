<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Fornecedor</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-800">
    <x-header />
    <div class="container mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold mb-6 text-center text-blue-600">Editar Fornecedor</h1>

        <form action="{{ route('fornecedores.update', $fornecedor) }}" method="POST" class="bg-white rounded-lg p-6 shadow">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nome" class="block text-sm font-medium text-gray-700">Nome:</label>
                <input type="text" id="nome" name="nome" value="{{ old('nome', $fornecedor->nome) }}" required class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email', $fornecedor->email) }}" required class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            </div>

            <div class="mb-4">
                <label for="categoria" class="block text-sm font-medium text-gray-700">Categoria:</label>
                <input type="text" id="categoria" name="categoria" value="{{ old('categoria', $fornecedor->categoria) }}" required class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            </div>

            <div class="mb-4">
                <label for="uf" class="block text-sm font-medium text-gray-700">UF:</label>
                <input type="text" id="uf" name="uf" maxlength="2" value="{{ old('uf', $fornecedor->uf) }}" required class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            </div>

            <div class="mb-4">
                <label for="telefone" class="block text-sm font-medium text-gray-700">Telefone:</label>
                <input type="text" id="telefone" name="telefone" value="{{ old('telefone', $fornecedor->telefone) }}" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 transition">
                Atualizar Fornecedor
            </button>
        </form>
    </div>
</body>
</html>
