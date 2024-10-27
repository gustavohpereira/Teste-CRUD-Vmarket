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
        @if(session('error'))
            <p class="text-red-600 text-center mb-4">{{ session('error') }}</p>
        @endif

        <h1 class="text-3xl font-bold mb-6 text-center text-blue-600">Lista de Produtos</h1>

        <div class="text-center mb-8">
            <a href="{{ route('produtos.create') }}"
                class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 transition">
                Criar Produto
            </a>
        </div>

        <form action="{{ route('produtos.index') }}" method="GET" class="mb-6">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Buscar produto por nome"
                class="border border-gray-300 rounded-md p-2">
            <input type="text" value="{{ request('fornecedor_search') }}" name="fornecedor_search"
                placeholder="Buscar produto por fornecedor" class="border border-gray-300 rounded-md p-2">
            <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 transition">
                Buscar
            </button>
        </form>

        <!-- Formulário para deletar múltiplos produtos -->
        <form action="{{ route('produtos.destroy') }}" method="POST" id="delete-multiple-form">
            @csrf
            @method('DELETE')

            <div class="flex items-center mb-4">
                <input type="checkbox" id="select-all" class="mr-2">
                <label for="select-all">Selecionar Todos</label>
            </div>

            <div class="flex items-center mb-4">
                <button type="submit"
                    class="px-4 py-2 bg-red-600 text-white font-semibold rounded-lg shadow hover:bg-red-700 transition">
                    Deletar Selecionados
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($produtos as $produto)
                    <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-xl font-bold text-blue-600">{{ $produto->nome }}</h2>
                            <span class="text-sm text-gray-500">R$ {{ number_format($produto->preco, 2, ',', '.') }}</span>
                        </div>

                        <p class="text-gray-700"><strong>Descrição:</strong> {{ $produto->descricao }}</p>

                        <p class="text-gray-700"><strong>Fornecedores:</strong>
                            @if($produto->fornecedores->isNotEmpty())
                                <ul class="list-disc pl-5">
                                    @foreach($produto->fornecedores as $fornecedor)
                                        <li>{{ $fornecedor->nome }}</li>
                                    @endforeach
                                </ul>
                            @else
                                N/A
                            @endif
                        </p>

                        <div class="mt-4 flex justify-between">
                            <a href="{{ route('produtos.edit', $produto) }}" class="text-blue-500 hover:underline">
                                Editar
                            </a>
                            <input type="checkbox" name="ids[]" value="{{ $produto->id }}" class="product-checkbox">
                        </div>
                    </div>
                @endforeach
            </div>
        </form>

        <script>
            document.getElementById('select-all').onclick = function () {
                const checkboxes = document.querySelectorAll('input[name="ids[]"]');
                checkboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                });
            };
        </script>
    </div>
</body>

</html>