<!-- resources/views/produtos/index.blade.php -->
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Produtos</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-800">

<x-header />
    <div class="container mx-auto py-10 px-4">
        @if(session('success'))
            <p class="text-green-600 text-center mb-4">{{ session('success') }}</p>
        @endif

        <h1 class="text-3xl font-bold mb-6 text-center text-blue-600">Lista de Produtos</h1>

        <div class="text-center mb-8">
            <a href="{{ route('produtos.create') }}" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 transition">
                Criar Produto
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($produtos as $produto)
                <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-xl font-bold text-blue-600">{{ $produto->nome }}</h2>
                        <span class="text-sm text-gray-500">R$ {{ number_format($produto->preco, 2, ',', '.') }}</span>
                    </div>
                    <p class="text-gray-700"><strong>Descrição:</strong> {{ $produto->descricao }}</p>
                    <p class="text-gray-700"><strong>Fornecedor:</strong> {{ $produto->fornecedor->nome ?? 'N/A' }}</p>
                    <div class="mt-4 flex justify-between">
                        <a href="{{ route('produtos.edit', $produto) }}" class="text-blue-500 hover:underline">
                            Editar
                        </a>
                        <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">
                                Excluir
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>
