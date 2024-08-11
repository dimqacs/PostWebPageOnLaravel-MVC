<x-app-layout>
    <div>
        <form action="{{route('admin.post.update', $post->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="title">Post Title: </label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Title"
                       value="{{$post->title}}">
            </div>
            <div class="form-group">
                <label for="content">Post Content: </label>
                <textarea name="content" class="form-control" id="content"
                          placeholder="Content">{{$post->content}}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Post Image URL: </label>
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
                <label>Post Tags: </label>
                @foreach($tags as $tag)
                    <div class="form-group ml-4">
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

            <button type="submit" class="btn btn-primary mb-3">Update</button>
        </form>
    </div>
</x-app-layout>
