<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles = Article::paginate(2);
        $flash = $request->session()->get('status');
        return view('article.index', compact('articles', 'flash'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $article = new Article();
        return view('article.create', compact('article'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $article = Article::findOrFail($article->id);
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $article = Article::findOrFail($article->id);
        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article = Article::findOrFail($article->id);
        $validatedData = $request->validate([
            'name' => 'required|unique:articles,name,' . $article->id,
            'body' => 'required|min:10'
        ]);
        $request->session()->flash('status', 'Updated successful!');
        $article->fill($validatedData);
        $article->save();
        return redirect()
            ->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Article $article)
    {
        $article = Article::find($article->id);
        if ($article) {
            try {
                $article->delete();
            } catch(\Illuminate\Database\QueryException $e) {
                $request->session()->flash('status', 'Article could not be deleted because has comments!!!');
                return redirect()
                    ->route('articles.index');
            }
            
        }
        return redirect()
            ->route('articles.index');
    }
}
