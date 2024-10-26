<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $fornecedores = Fornecedor::all();
        return view("fornecedores.index", compact("fornecedores"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fornecedores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:fornecedores,email',
            'cnpj' => 'required|string|unique:fornecedores,cnpj',
            'categoria' => 'required|string|max:255',
            'uf' => 'required|string|size:2',
            'telefone' => 'nullable|string|max:15',
        ]);

        // Criação do fornecedor
        Fornecedor::create($validatedData);

        return redirect()->route('fornecedores.index')->with('success', 'Fornecedor criado');
    }




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $fornecedor = Fornecedor::find($id);
        return view('fornecedores.show', compact('fornecedor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fornecedor $fornecedor)
    {
        return view('fornecedores.edit', ['fornecedor' => $fornecedor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fornecedor $fornecedor)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:fornecedores,email,' . $fornecedor->id,
            'cnpj' => 'required|string|unique:fornecedores,cnpj,' . $fornecedor->id,
            'categoria' => 'required|string|max:255',
            'uf' => 'required|string|size:2',
            'telefone' => 'nullable|string|max:15',
        ]);

        // Atualiza o fornecedor
        $fornecedor->update($validatedData);

        return redirect()->route('fornecedores.index')->with('success', 'Fornecedor atualizado');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fornecedor = Fornecedor::find($id);
        $fornecedor->delete();
        return redirect()->route('fornecedores.index')->with('success', 'fornecedor deletado');
    }
}
