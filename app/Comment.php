<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'article_id',
        'comment'
    ];

    public function article()
    {
        // コメントは特定の投稿に紐づいている
        return $this->belongsTo('App\Article');
    }
}
