@extends('layouts.main')
@section('content')
    <div>
        <form action="{{route('article.store')}}" method="post">
            @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title for article</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Title for article" value="{{old('title')}}">
            @error('title')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea type="text" class="form-control" name="article_content" id="content" placeholder="Content">{{old('article_content')}}</textarea>
            @error('article_content')
            <p class="text-danger">Fill content in this field</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" class="form-control" name="image" id="image" placeholder="Image" value="{{old('image')}}">
            @error('image')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
            <div class="input-group mb-3">
                <label for="category" class="input-group-text">Category</label>
                <select class="form-select" id="category" name="category_id">
                    @foreach($categories as $category)
                        <option
                            {{old('category_id')== $category->id ? ' selected' : ''}}
                            value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>

            </div>
<div class="form-group mb-3">
    <label for="tags">Tags</label>
    <select multiple class="form-control"  id="tags" name="tags[]">
        @foreach($tags as $tag)
            <option value="{{$tag->id}}">{{$tag->title}}</option>
        @endforeach
    </select>
</div>

            <div class="col-auto">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
        </form>
    </div>

@endsection
