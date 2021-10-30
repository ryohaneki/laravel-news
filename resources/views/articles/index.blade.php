<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale= 1.0">
    <meta http-equiv="content-type" charset="utf-8">
    <title>Laravel news</title>
</head>

<body>
    <h1>Laravel News</h1>

    <section>
        <h2>さぁ、最新のニュースをシェアしましょう</h2>
        @include('validate.validation')
        <form action="{{ route('articles.store') }}" method="POST">
            @csrf
            <div>
                <p>title</p>
                <input type='text' name='title' value='タイトルを記入'>
            </div>
            <div>
                <p>記事</p>
                <textarea name="text"　value='記事を記入(３０文字以下)'></textarea>
            </div>
            <div>
                <input type="submit" value="投稿">
            </div>
        </form>

        <tbody>
            @foreach ($articles as $article)
              <div>
                <p>{{$article->title}}</p>
                <p>{{$article->text}}</p>
                <p><a href="{{ route('articles.show', $article->id) }}">記事全文・コメントを見る</a></p>
              </div>
              <hr>
            @endforeach
        </tbody>
        
    </section>
</body>