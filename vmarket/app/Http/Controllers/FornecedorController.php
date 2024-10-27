<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;
use Log;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Fornecedor::query();

       
        if ($request->has('search') && $request->search != '') {
            $query->where('nome', 'LIKE', '%' . $request->search . '%');
        }

        $fornecedores = $query->get();

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
    public function edit(string $id)
    {
        $fornecedor = Fornecedor::find($id);

        return view('fornecedores.edit', compact('fornecedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email',
            'categoria' => 'required|string|max:255',
            'uf' => 'required|string|size:2',
            'telefone' => 'nullable|string|max:15',
        ]);

        $fornecedor = Fornecedor::find($id);

        if ($fornecedor) {
            $fornecedor->update($request->all());

            return redirect()->route("fornecedores.index")->with("success", "Fornecedor atualizado com sucesso!");
        }

        return redirect()->route("fornecedores.index")->with("error", "Fornecedor não encontrado.");
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

    public function search(Request $request)
    {
        $searchTerm = $request->input('nome');

        $fornecedores = Fornecedor::where('nome', 'like', '%' . $searchTerm . '%')->get();

        return view('fornecedores.index', compact('fornecedores'));
    }
}
