@extends('layouts.admin')

@section('content')
    <div>
        @foreach($published_articles as $article)
            <a href="{{route('article.show', $article->id)}}">{{$article->title}}</a><br>
            <div>{{$article->article_content}}</div>

        @endforeach
    </div>
    <div><a href="{{route('article.create')}}" class="btn btn-secondary m-lg-3" >Create article</a></div>
    <div>
        {{$published_articles->withQueryString()->links()}}
    </div>
@endsection
