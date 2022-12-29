<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleComment;
use Illuminate\Http\Request;

class ArticleCommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Article $article)
    {
        $validatedData = $request->validate([
            'content' => 'required|min:1'
        ]);
        $comment = $article->comments()->make();
        $comment->fill($validatedData);
        $comment->save();

        return redirect()
            ->route('articles.show', $article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @param  \App\Models\ArticleComment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article, ArticleComment $comment)
    {
        return view('article_comment.edit', compact('article', 'comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @param  \App\Models\ArticleComment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article, ArticleComment $comment)
    {
        $validatedData = $request->validate([
            'content' => 'required|min:1'
        ]);
        $comment->fill($validatedData);
        $comment->save();

        return redirect()
            ->route('articles.show', $article);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @param  \App\Models\ArticleComment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article, ArticleComment $comment)
    {
        $comment->delete();
        return redirect()
            ->route('articles.show', $article);
    }
}
