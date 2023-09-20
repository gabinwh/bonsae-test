<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use http\Client\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class ProdutoController extends Controller
{
    protected $messages = [
        'nome.required' => 'O campo nome é obrigatório.',
        'nome.max' => 'O campo nome deve ter no máximo 255 caracteres.',
        'quantidade.required' => 'O campo quantidade é obrigatório.',
        'quantidade.numeric' => 'O campo quantidade deve ser um número.',
        'quantidade.min' => 'O campo quantidade deve ser no mínimo 0 (zero).',
        'quantidade.max' => 'O campo quantidade deve ser menor que 1000000 (um milhão).',
        'preco.required' => 'O campo preço é obrigatório.',
        'preco.max' => 'O campo preço deve ser menor que 1 milhão.',
        'descricao.required' => 'O campo descrição é obrigatório.'
    ];
    public function index(): View
    {
        $produtos = Produto::all();

        return view('home', compact("produtos"));
    }

    public function create(): View
    {
        return view('create-produto');
    }

    public function store(Request $request): RedirectResponse|View
    {
        $attributes = $request->validate([
            'nome' => 'required|max:255',
            'quantidade' => 'required|numeric|min:0|max:999999',
            'preco' => 'required|string|max:9',
            'descricao' => 'required'
        ], $this->messages);

        Produto::query()->create($attributes);
        return redirect()->route('listar-produtos');
    }

    public function show(int $id): View
    {
        try {
        $produto = Produto::query()->findOrFail($id);
        return view('show-produto', compact("produto"));
        }catch (\Exception $exc){
            return view('errors.geral', compact("exc"));
        }
    }
    public function edit(int $id): View
    {
        try {
            $produto = Produto::query()->findOrFail($id);
            return view('edit-produto', compact("produto"));
        }catch (\Exception $exc){
            return view('errors.geral', compact("exc"));
        }
    }

    public function update(int $id, Request $request): RedirectResponse
    {
        $attributes = $request->validate([
            'nome' => 'nullable|max:255',
            'quantidade' => 'nullable|numeric|min:0|max:1000000',
            'preco' => 'nullable|string|max:9',
            'descricao' => ''
        ], $this->messages);

        Produto::query()->find($id)->update($attributes);
        return redirect()->route('listar-produtos');
    }

    public function delete($id): RedirectResponse
    {
        Produto::query()->find($id)->delete();

        return redirect()->route('listar-produtos');
    }
}
