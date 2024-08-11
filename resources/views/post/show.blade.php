@extends('layouts.main')
@section('title')
    Update Post
@endsection
@section('htmlFundament')
    <div>
        <div><b>{{$post->id}}.</b> {{$post->title}}</div>
        <div>{{$post->content}}</div>
        @foreach($post->tags as $tag)
            <div>{{$tag->name}}</div>
        @endforeach
    </div>
@endsection
