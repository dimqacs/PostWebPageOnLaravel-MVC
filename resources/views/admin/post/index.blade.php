<x-app-layout>
    <h2 class="text-center">Current Posts: </h2>
    <div>
        <a href="{{route('admin.post.create')}}" class="btn btn-primary mb-3">Create a new Post</a>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Posts</h3>
        </div>

        <div class="card-body pb-0">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th class="text-center" style="width: 50px">Id</th>
                    <th>Title</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td class="text-center">{{$post->id}}</td>
                        <td><a href="{{route('admin.post.show', compact('post'))}}" class="custom-link">{{$post->title}}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer clearfix d-flex justify-content-end">
            {{$posts->withQueryString()->links()}}
        </div>
    </div>
</x-app-layout>
