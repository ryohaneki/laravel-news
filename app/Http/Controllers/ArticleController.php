<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Validator;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles')); 
            //$articles = 'articles'をcompactで表す  
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|string|max:30',
                'text'  => 'required|string'
            ],
            [
                'title.required' => 'タイトルを記入してください。',
                'title.max'      => 'タイトルは30文字以下です。',
                'text.required'  => '記事を記入してください。',
            ]
        );

        Article::create([
            'title' => $request->title,
            'text'  => $request->text,
        ]);

        return redirect()->back();
    }

    public function show($articleid)
    {
        
        $article = Article::find($articleid);
        // dd($article);exit;
        $comments = $article->comments()->orderBy('created_at', 'desc')->get();
        return view('articles.comment', compact('article','comments'));

    }
    
}