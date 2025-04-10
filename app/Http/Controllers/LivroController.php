<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;

class LivroController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $livros = Auth::user()->livros()->latest()->paginate(10);
        return view('livros.index', compact('livros'));
    }

    public function create()
    {
        return view('livros.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|max:255',
            'autor' => 'required|max:255',
            'descricao' => 'nullable',
            'ano_publicacao' => 'nullable|integer|min:1000|max:' . (date('Y') + 1),
            'editora' => 'nullable|max:255',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('imagem')) {
            $imagePath = $request->file('imagem')->store('livros', 'public');
            $validated['imagem'] = $imagePath;
        }

        $validated['user_id'] = Auth::user()->id;

        Livro::create($validated);

        return redirect()->route('livros.index')->with('sucess', 'Livro adicionado com sucesso!');
    }

    public function show(Livro $livro)
    {
        $this->authorize('view', $livro);
        return view('livros.show', compact('livro'));
    }

    public function edit(Livro $livro)
    {
        $this->authorize('update', $livro);
        return view('livros.edit', compact('livro'));
    }

    public function update(Request $request, Livro $livro) 
    {
        $this->authorize('update', $livro);

        $validated = $request->validate([
            'titulo' => 'required|max:255',
            'autor' => 'required|max:255',
            'descricao' => 'nullable',
            'ano_publicacao' => 'nullable|integer|min:1000|max:' . (date('Y') + 1),
            'editora' => 'nullable|max:255',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('imagem')) {
            if ($livro->imagem) {
                Storage::disk('public')->delete($livro->imagem);
            }
            
            $imagePath = $request->file('imagem')->store('livros', 'public');
            $validated['imagem'] = $imagePath;
        }
        
        $livro->update($validated);
        
        return redirect()->route('livros.show', $livro)->with('success', 'Livro atualizado com sucesso!');
    }

    public function destroy(Livro $livro)
    {
        $this->authorize('delete', $livro);
        
        if ($livro->imagem) {
            Storage::disk('public')->delete($livro->imagem);
        }
        
        $livro->delete();
        
        return redirect()->route('livros.index')->with('success', 'Livro removido com sucesso!');
    }
}
