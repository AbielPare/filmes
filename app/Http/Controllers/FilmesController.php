<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use Illuminate\Http\Request;

class FilmesController extends Controller
{
    public function index(Request $request)
{
    // Consulta básica
    $query = Filme::query();
    
    // Filtragem por ano
    if ($request->filled('ano')) {
        $query->where('ano', $request->ano);
    }

    // Filtragem por categoria
    if ($request->filled('categoria')) {
        $query->where('categoria', $request->categoria);
    }
    
    // Ordenar os filmes
    $filmes = $query->get();
    
    // Obter todos os anos e categorias para os filtros
    $anos = Filme::select('ano')->distinct()->pluck('ano')->sort()->values(); // Ordenar e obter os anos distintos
    $categorias = Filme::select('categoria')->distinct()->pluck('categoria')->sort(); // Ordenar e obter as categorias distintas
    
    return view('filmes.index', [
        'filmes' => $filmes,
        'anos' => $anos,
        'categorias' => $categorias,
    ]);
}


    public function cadastrar() {
        return view('filmes.cadastrar');
    }

    public function gravar(Request $form) {

        

        $dados = $form->validate([
            'nome' => 'required|min:3',
            'sinopse' => 'required|min:3',
            'ano' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'categoria' => 'required|min:3',
            'link' => 'required|min:3',
            
        ]);
        
        $img = $form->file('imagem')->store('filmes', 'imagens');

        // Verifica se a imagem foi enviada
        $dados['imagem'] = $img;


        // Cria um novo filme com os dados fornecidos
        Filme::create($dados);
        
        return redirect()->route('filmes');
    }

    public function apagar($id) {
        $filme = Filme::findOrFail($id); // Busca o usuário pelo ID ou lança erro 404 se não encontrar
        return view('filmes.apagar', ['filme' => $filme]); // Retorna a view de confirmação de exclusão
    }
    
    public function deletar($id) {
        $filme = Filme::findOrFail($id);
        $filme->delete(); // Exclui o filme
        return redirect()->route('filmes'); // Redireciona para a lista de filmes
    }

    public function editar($id) {

        $filme = Filme::find($id);
        if (!$filme) {
        return redirect()->route('filmes')->with('erro', 'Filme não encontrado');
    }
        return view('filmes.editar', compact('filme'));

    }

    public function atualizar(Request $request, $id) {

        $filme = Filme::find($id);
        if (!$filme) {
        return redirect()->route('filmes')->with('erro', 'Filme não encontrado');
    }

    $request->validate([
        'nome' => 'required|string|max:255',
        'sinopse' => 'required|string',
        'ano' => 'required|integer',
        'categoria' => 'required|string',
        'link' => 'required|url',
        'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $filme->nome = $request->input('nome');
    $filme->sinopse = $request->input('sinopse');
    $filme->ano = $request->input('ano');
    $filme->categoria = $request->input('categoria');
    $filme->link = $request->input('link');

    if ($request->hasFile('imagem')) {
        $imagem = $request->file('imagem');
        $imagemPath = $imagem->store('img', 'public');
        $filme->imagem = basename($imagemPath);
    }

    $filme->save();

    return redirect()->route('filmes')->with('sucesso', 'Filme atualizado com sucesso');

    }

    

    

}
