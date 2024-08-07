@extends('layouts.main')
@section('html_fundament')
    <div>
        <form action="{{route('post.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">Enter Post Title: </label>
                <input value="{{old('title')}}" type="text" name="title" class="form-control" id="title" placeholder="Title">
                @error('title')
                <p class="text-danger">{{$message}}</p>
                @enderror()
            </div>
            <div class="form-group">
                <label for="content">Enter Post Content: </label>
                <textarea name="content" class="form-control" id="content" placeholder="Content">{{old('content')}}</textarea>
                @error('content')
                <p class="text-danger">{{$message}}</p>
                @enderror()
            </div>
            <div class="form-group">
                <label for="image">Enter Post Image URL: </label>
                <input type="text" name="image" class="form-control" id="image" placeholder="Image URL" value="{{old('image')}}">
                @error('image')
                <p class="text-danger">{{$message}}</p>
                @enderror()
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category_id">
                    @foreach($categories as $category)
                        <option
                            {{$category->id == old('category_id') ? ' selected': ''}}
                            value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <h1>Select Tags: </h1>
                @foreach($tags as $tag)
                    <div class="form-group">
                        <input
                            {{in_array($tag->id, old('tags', [])) ? 'checked' : ''}}
                            class="form-check-input" type="checkbox" value="{{$tag->id}}" id="{{$tag->name}}" name="tags[]">
                        <label class="form-label" for="{{$tag->name}}">{{$tag->name}}</label>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
