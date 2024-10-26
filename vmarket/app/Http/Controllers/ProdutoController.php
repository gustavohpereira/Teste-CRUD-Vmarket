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
    public function index()
    {
        $produtos = Produto::all();
        return view("produtos.index", ["produtos" => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fornecedores = Fornecedor::all();
        return view('produtos.create', compact('fornecedores')); // Passa os fornecedores para a view
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated = $this->produto->update()->where("id", $id)->update($request->all());

        if ($updated) {
            return redirect()->route("produto")->with("success", "");
        }

        return redirect()->route("produto")->with("error", "");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
