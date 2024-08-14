<x-app-layout>
    <style>
        .font-size-18 {
            font-size: 18px;
        }
    </style>
    <h2 class="text-center">Post Information</h2>
    <div class="container mt-4">
        <div class="row" >
            <!-- First Column -->
            <div class="col-md-6">
                <div><b class="font-size-18">Post ID: </b>{{$post->id}}</div>
                <div><b class="font-size-18">Post Title: </b>{{$post->title}}</div>
                <div><b class="font-size-18">Post Content: </b><i>{{$post->content}}</i></div>
            </div>

            <!-- Second Column -->
            <div class="col-md-6">
                <div><b class="font-size-18">Post Likes: </b>{{$post->like == null ? '0': $post->like}}</div>
                <div><b class="font-size-18">Post Category: </b>{{$post->category->name}}</div>
                <div><b class="font-size-18">Post Tags: </b></div>
                <div class="ml-3">
                    {{$post->tags->isEmpty() ? 'No tags added yet.' : ''}}
                    @foreach($post->tags as $index => $tag)
                        <div><b>{{$index + 1}}</b>. {{$tag->name}}</div>
                    @endforeach
                </div>
                @if(auth()->user()->can('edit posts'))
                    <a class="btn btn-primary mt-3" href="{{route('admin.post.edit', compact('post'))}}">Update this
                        Post</a>
                @endif
                @if(auth()->user()->can('delete posts'))
                    <a class="btn btn-danger mt-3 ml-2" href="{{route('admin.post.delete', compact('post'))}}">Delete
                        this Post</a>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
