@extends('layouts.main')
@section('content')
    <div>

        {{$article->title}}<br>
        <div>{{$article->article_content}}</div>
    </div>
<div>
    <a href="{{route('article.edit', $article->id)}}">Edit</a>
</div>

        <form action="{{route('article.delete', $article->id)}}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Delete" class="btn btn-danger">
        </form>

    <div>
        <a href="{{route('article.index')}}">Back</a>
    </div>
@endsection
