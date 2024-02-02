@extends('layouts.main')
@section('content')
    <div>
        <form action="{{route('article.update', $article->id)}}" method="post">
            @csrf
            @method('patch')
        <div class="mb-3">
            <label for="title" class="form-label">Title for article</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Title for article" value="{{$article->title}}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea type="text" class="form-control" name="article_content" id="content" placeholder="Content">{{$article->article_content}}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" class="form-control" name="image" id="image" placeholder="Image" value="{{$article->image}}">
        </div>
            <div class="input-group mb-3">
                <label for="category" class="input-group-text">Category</label>
                <select class="form-select" id="category" name="category_id">
                    @foreach($categories as $category)

                        <option
                            {{$category->id ===  $article->category_id ? ' selected':''}}
                            value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="tags">Tags</label>
                <select multiple class="form-control"  id="tags" name="tags[]">
                    @foreach($tags as $tag)
                        <option
                            @foreach($article->tags as $articleTag)
                                {{$tag->id ===  $articleTag->id ? ' selected':''}}
                            @endforeach

                            value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach

                </select>
            </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
        </form>
    </div>

@endsection
