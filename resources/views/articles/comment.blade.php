<body>
    <section>
        <h3>{{ $article->title }}</h3>
        <hr>
        <p>記事:{{ $article->text }}</p>
    </section>

    <section>
        <div>
             @include('validate.validation')    
            <form method="POST" action="{{ route('comments.store') }}">
                @csrf
                <input type="hidden" name="article_id" value="{{ $article->id }}">
                <div>
                    <label>コメント</label>
                    <textarea name="comment" placeholder='コメントは50字以下'></textarea>
                </div>
                <button type="submit">コメントを投稿</button>
            </form>
        <div>
            @foreach ($comments as $comment)
            <div>
                <p>{{$comment->comment}}</p>
                <form method="POST" action="{{ route('comments.destroy', $comment->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">削除</button>
                </form>
            </div>
            @endforeach
        </div>
    </section>
</body>
 

{{-- 投稿すると419エラー発生　原因不明　強制リロードで治った --}}

