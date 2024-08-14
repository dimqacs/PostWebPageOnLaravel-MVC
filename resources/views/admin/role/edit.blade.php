<x-app-layout>
    <h2 class="text-center mb-3">Updating Role with Id - {{$role->id}}</h2>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Updating Form</h3>
        </div>
        <form action="{{route('admin.role.update', $role->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Role Name: </label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name"
                           value="{{$role->name}}">
                </div>
                <div>
                    <label>Role Permissions: </label>
                    @foreach($permissions as $permission)
                        <div class="form-group ml-4">
                            <input class="form-check-input" type="checkbox" value="{{$permission->id}}"
                                   id="{{$permission->name}}"
                                   name="permissions[]"
                            @foreach($role->permissions as $rolePermission)
                                {{$permission->id === $rolePermission->id ? ' checked' : ''}}
                                @endforeach
                            >
                            <label class="form-check-label" for="{{$permission->name}}">{{$permission->name}}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary mb-3">Update</button>
            </div>
        </form>
    </div>
</x-app-layout>
