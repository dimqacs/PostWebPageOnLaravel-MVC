@extends('layouts.main')
@section('title')
    Posts Page
@endsection
@section('htmlFundament')
    <h1>Posts Page</h1>
    @foreach($posts as $post)
        <div><b>{{$post->id}}.</b> {{$post->title}}</div>
    @endforeach
    <div class="mt-3">
        {{$posts->links()}}
    </div>
@endsection
