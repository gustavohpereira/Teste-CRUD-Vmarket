<!-- resources/views/fornecedores/index.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Listagem de Fornecedores</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    @endif
</head>

<body>
    <h1>Lista de Fornecedores</h1>





    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <button>
        <a href="{{ route('fornecedores.create') }}">Criar Fornecedor</a>
    </button>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>CNPJ</th>
                <th>Categoria</th>
                <th>UF</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fornecedores as $fornecedor)
                <tr>
                    <td>{{ $fornecedor->id }}</td>
                    <td>{{ $fornecedor->nome }}</td>
                    <td>{{ $fornecedor->email }}</td>
                    <td>{{ $fornecedor->cnpj }}</td>
                    <td>{{ $fornecedor->categoria }}</td>
                    <td>{{ $fornecedor->uf }}</td>
                    <td>{{ $fornecedor->telefone }}</td>
                    <td>

                        <a href="{{ route('fornecedores.edit', $fornecedor) }}">Editar</a> |
                        <form action="{{ route('fornecedores.destroy', $fornecedor->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
