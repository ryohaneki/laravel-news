<?php

namespace App\Http\Controllers;

use App\Comment;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function comment()
    {
        $comments = Article::all();
        
        return view("articles.comment", compact('comments'));        
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'article_id' => 'required|numeric|exists:comments,id',
                'comment'    => 'required|string|max:50',
            ],
            [
                'article_id.required' => '入力値が不正です',
                'article_id.numeric'  => '入力値が不正です',
                'article_id.exists'   => '入力値が不正です',
                'comment.required'    => 'コメントは必須です。',
                'comment.string'      => 'コメントには文字列を入力してください。',
                'comment.max'         => 'コメントは50文字以下です。',
            ]
        );

        Comment::create([
            'article_id' => $request->article_id,
            'comment'    => $request->comment,
        ]);
        
        return redirect()->back();
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);

        $comment->delete();

        return redirect()->back();
    }
}
