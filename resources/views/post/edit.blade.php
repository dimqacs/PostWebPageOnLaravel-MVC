@extends('layouts.main')
@section('title')
    Edit Post
@endsection
@section('htmlFundament')
    <div>
        <form action="{{route('post.update', $post->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="title">Enter Post Title: </label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Title"
                       value="{{$post->title}}">
            </div>
            <div class="form-group">
                <label for="content">Enter Post Content: </label>
                <textarea name="content" class="form-control" id="content"
                          placeholder="Content">{{$post->content}}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Enter Post Image URL: </label>
                <input type="text" name="image" class="form-control" id="image" placeholder="Image URL"
                       value="{{$post->image}}">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category_id">
                    @foreach($categories as $category)
                        <option
                            {{$category->id === $post->category->id ? ' selected' : ''}}
                            value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <h1>Select Tags: </h1>
                @foreach($tags as $tag)
                    <div class="form-group">
                        <input class="form-check-input" type="checkbox" value="{{$tag->id}}" id="{{$tag->name}}"
                               name="tags[]"
                        @foreach($post->tags as $postTag)
                            {{$tag->id === $postTag->id ? ' checked' : ''}}
                            @endforeach
                        >
                        <label class="form-check-label" for="{{$tag->name}}">{{$tag->name}}</label>
                    </div>
                @endforeach
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
