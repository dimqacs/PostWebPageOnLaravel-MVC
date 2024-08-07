@extends('layouts.main')
@section('html_fundament')
    <h1>Posts Page</h1>
    @foreach($posts as $post)
        <div> <b>{{$post->id}}.</b> {{$post->title}}</div>
    @endforeach
@endsection
