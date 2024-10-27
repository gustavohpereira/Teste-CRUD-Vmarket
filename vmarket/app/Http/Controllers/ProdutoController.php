<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\Produto;
use Illuminate\Http\Request;
use Log;

class ProdutoController extends Controller
{



    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Produto::with('fornecedores');

        if ($request->has('search') && $request->search != '') {
            $query->where('nome', 'LIKE', '%' . $request->search . '%');
        }

        
        if ($request->has('fornecedor_search') && $request->fornecedor_search != '') {
            $query->whereHas('fornecedores', function ($q) use ($request) {
                $q->where('nome', 'LIKE', '%' . $request->fornecedor_search . '%');
            });
        }

        $produtos = $query->get();

        return view('produtos.index', compact('produtos'));
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
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric',
            'fornecedores' => 'required|array',
            'fornecedores.*' => 'exists:fornecedores,id',
        ]);

        
        $produto = Produto::create($request->only(['nome', 'descricao', 'preco']));

        
        $produto->fornecedores()->sync($request->fornecedores);

        return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso!');
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
            'fornecedores' => 'required|array', 
            'fornecedores.*' => 'exists:fornecedores,id', 
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string|max:255',
            'preco' => 'required|numeric',
        ]);
    
        $produto = Produto::find($id);
    
        if ($produto) {
           
            $produto->update($request->only(['nome', 'descricao', 'preco'])); 
    
           
            $produto->fornecedores()->sync($request->fornecedores);
    
            return redirect()->route("produtos.index")->with("success", "Produto atualizado com sucesso!");
        }
    
        return redirect()->route("produtos.index")->with("error", "Produto não encontrado.");
    }


    public function destroy(Request $request)
    {

        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:produtos,id',
        ]);


        Produto::destroy($request->ids);

        return redirect()->route('produtos.index')->with('success', 'Produtos excluídos com sucesso!');
    }

}
