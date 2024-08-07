@extends('layouts.main')
@section('html_fundament')
    <div>
        <div><b>{{$post->id}}.</b> {{$post->title}}</div>
        <div>{{$post->post_content}}</div>
    </div>
@endsection
