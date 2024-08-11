<x-app-layout>
    <h2 class="text-center">Current Posts: </h2>
    <div>
        <a href="{{route('admin.post.create')}}" class="btn btn-primary mb-3">Create a new Post</a>
    </div>
    @foreach($posts as $post)
        <div><b>{{$post->id}}.</b> {{$post->title}}</div>
    @endforeach
    <div class="mt-3">
        {{$posts->withQueryString()->links()}}
    </div>
</x-app-layout>
