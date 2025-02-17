<x-app-layout>
    <h2 class="text-center">Create a New Post</h2>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Creating Form</h3>
        </div>
        <form action="{{route('admin.post.store')}}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Enter Post Title: </label>
                    <input value="{{old('title')}}" type="text" name="title" class="form-control" id="title"
                           placeholder="Title">
                    @error('title')
                    <p class="text-danger">{{$message}}</p>
                    @enderror()
                </div>
                <div class="form-group">
                    <label for="content">Enter Post Content: </label>
                    <textarea name="content" class="form-control" id="content"
                              placeholder="Content">{{old('content')}}</textarea>
                    @error('content')
                    <p class="text-danger">{{$message}}</p>
                    @enderror()
                </div>
                <div class="form-group">
                    <label for="image">Enter Post Image URL: </label>
                    <input type="text" name="image" class="form-control" id="image" placeholder="Image URL"
                           value="{{old('image')}}">
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
                    <label>Select Tags: </label>
                    @foreach($tags as $tag)
                        <div class="form-group ml-4">
                            <input
                                {{in_array($tag->id, old('tags', [])) ? 'checked' : ''}}
                                class="form-check-input" type="checkbox" value="{{$tag->id}}" id="{{$tag->name}}"
                                name="tags[]">
                            <label class="form-label" for="{{$tag->name}}">{{$tag->name}}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary mb-3">Create</button>
            </div>
        </form>
    </div>
</x-app-layout>
