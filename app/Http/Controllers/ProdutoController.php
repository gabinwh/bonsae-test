<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProdutoController extends Controller
{
    public function index(): View
    {
        $produtos = Produto::all();

        return view('home', compact("produtos"));
    }

    public function create(): View
    {
        return view('create-produto');
    }

    public function store(Request $request): RedirectResponse
    {
        $attributes = $request->validate([
            'nome' => 'required|string|min:1',
            'quantidade' => 'required|numeric|min:0',
            'preco' => 'required',
            'descricao' => 'required|string'
        ]);

        Produto::query()->create($attributes);
        return redirect()->route('listar-produtos');
    }

    public function show(int $id): View
    {
        $produto = Produto::query()->find($id);
        return view('show-produto', compact("produto"));
    }
    public function edit(int $id): View
    {
        $produto = Produto::query()->find($id);
        return view('edit-produto', compact("produto"));
    }

    public function update(int $id, Request $request): RedirectResponse
    {
        $attributes = $request->validate([
            'nome' => 'nullable|required|string|min:1',
            'quantidade' => 'nullable|required|numeric|min:0',
            'preco' => 'nullable|required',
            'descricao' => 'nullable|required|string'
        ]);

        Produto::query()->find($id)->update($attributes);
        return redirect()->route('listar-produtos');
    }

    public function delete($id): RedirectResponse
    {
        Produto::query()->find($id)->delete();

        return redirect()->route('listar-produtos');
    }
}
