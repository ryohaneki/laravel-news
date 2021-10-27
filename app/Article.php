<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    protected $fillable = [
        'title',
        'text'
    ];

    public function comments()
    {
        // 投稿のコメントは複数あるためhasMany $thisでどこでも呼び出せる
        return $this->hasMany('App\Comment');
    }
}
