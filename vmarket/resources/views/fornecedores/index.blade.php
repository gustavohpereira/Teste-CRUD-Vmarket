<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Fornecedores</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-800">
    <x-header />
    <div class="container mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold mb-6 text-center text-blue-600">Lista de Fornecedores</h1>

        @if(session('success'))
            <p class="text-green-600 text-center mb-4">{{ session('success') }}</p>
        @endif
        @if(session('error'))
            <p class="text-red-600 text-center mb-4">{{ session('error') }}</p>
        @endif

        <form action="{{ route('fornecedores.index') }}" method="GET" class="mb-6">
            <input type="text" name="search" placeholder="Buscar fornecedor por nome"
                   class="border border-gray-300 rounded-md p-2" value="{{ request('search') }}">
            <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 transition">
                Buscar
            </button>
        </form>

        <div class="text-center mb-8">
            <a href="{{ route('fornecedores.create') }}"
               class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 transition">
                Criar Fornecedor
            </a>
        </div>

        <form action="{{ route('fornecedores.destroy') }}" method="POST" id="delete-multiple-form">
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
                @foreach($fornecedores as $fornecedor)
                    <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-xl font-bold text-blue-600">{{ $fornecedor->nome }}</h2>
                            <span class="text-sm text-gray-500">ID: {{ $fornecedor->id }}</span>
                        </div>
                        <p class="text-gray-700"><strong>Email:</strong> {{ $fornecedor->email }}</p>
                        <p class="text-gray-700"><strong>CNPJ:</strong> {{ $fornecedor->cnpj }}</p>
                        <p class="text-gray-700"><strong>Categoria:</strong> {{ $fornecedor->categoria }}</p>
                        <p class="text-gray-700"><strong>UF:</strong> {{ $fornecedor->uf }}</p>
                        <p class="text-gray-700"><strong>Telefone:</strong> {{ $fornecedor->telefone }}</p>
                        
                        <div class="mt-4 flex justify-between">
                            <a href="{{ route('fornecedores.edit', $fornecedor->id) }}" class="text-blue-500 hover:underline">
                                Editar
                            </a>
                            <input type="checkbox" name="ids[]" value="{{ $fornecedor->id }}" class="fornecedor-checkbox">
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
