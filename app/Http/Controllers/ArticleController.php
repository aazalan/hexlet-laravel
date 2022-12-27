<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::paginate(2);
        $flash = $request->session()->get('status');
        return view('article.index', ['articles' => $articles, 'flash' => $flash]);
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('article.show', compact('article'));
    }

    public function create()
    {
        $article = new Article();
        return view('article.create', compact('article'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:articles',
            'body' => 'required|min:10',
        ]);
        $request->session()->flash('status', 'Added successful!');
        $article = new Article();
        $article->fill($validatedData);
        $article->save();

        return redirect()
            ->route('articles.index');
    }
}
