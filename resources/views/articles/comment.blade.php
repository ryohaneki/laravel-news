<body>
    <section>
        <h3>{{ $article->title }}</h3>
        <hr>
        <p>記事:{{ $article->text }}</p>
    </section>

    <section>
        @include('validate.validation')    
        <form method="POST" action="{{ route('comments.store') }}">
            @csrf
            <input type="hidden" name="article_id" value="{{ $article->id }}">
            <textarea name="comment"></textarea>
            <input type="submit" value="コメントを記入">
        </form>

        <tbody>
            @foreach ($comments as $comment)
            <div>
                <p>{{$comment->comment}}</p>
            </div>
            @endforeach
        </tbody>

        <form method="POST" action="{{ route('comments.destroy', $comment->id) }}">
            @csrf
            @method('delete')
            <input type='submit' value='削除' onclick = 'return confirm("削除してよろしいですか？");'>
        </form>
    </section>
</body>

