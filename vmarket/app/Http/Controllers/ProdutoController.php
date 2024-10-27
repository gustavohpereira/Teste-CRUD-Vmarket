<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{



    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   

        $query = Produto::query();

        if ($request->has('nomeSearch') && $request->search != '') {
            $query->where('nome', 'LIKE', '%' . $request->search . '%');
        }

        if ($request->has('fornecedorSearch') && $request->search != '') {
            $query->where('fornecedor_id', 'LIKE', '%' . $request->search . '%');
        }



        $produtos = Produto::all();
        return view("produtos.index", ["produtos" => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fornecedores = Fornecedor::all();
        return view('produtos.create', compact('fornecedores')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'fornecedor_id' => 'required|exists:fornecedores,id',
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string|max:255',
            'preco' => 'required|numeric',
        ]);


        Produto::create($request->all());

        return redirect()->route('produtos.index')->with('success', 'Produto cadastrado com sucesso!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produto = Produto::find($id);
        $fornecedores = Fornecedor::all();
        return view('produtos.edit', compact('produto', 'fornecedores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'fornecedor_id' => 'required|exists:fornecedores,id',
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string|max:255',
            'preco' => 'required|numeric',
        ]);


        $produto = Produto::find($id);

        if ($produto) {
            $produto->update($request->all());

            return redirect()->route("produtos.index")->with("success", "Produto atualizado com sucesso!");
        }

        return redirect()->route("produtos.index")->with("error", "Produto não encontrado.");
    }
}
