<x-app-layout>
    <h2 class="text-center">Create a New Role</h2>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Creating Form</h3>
        </div>
        <form action="{{route('admin.role.store')}}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Enter Role Name: </label>
                    <input value="{{old('name')}}" type="text" name="name" class="form-control" id="name"
                           placeholder="Name">
                    @error('name')
                    <p class="text-danger">{{$message}}</p>
                    @enderror()
                </div>
                <div>
                    <label for="permissions[]">Select Permissions: </label>
                    @foreach($permissions as $permission)
                        <div class="form-group ml-4">
                            <input
                                {{in_array($permission->id, old('permissions', [])) ? 'checked' : ''}}
                                class="form-check-input" type="checkbox" value="{{$permission->id}}" id="{{$permission->name}}"
                                name="permissions[]">
                            <label class="form-label" for="{{$permission->name}}">{{$permission->name}}</label>
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
