<x-app-layout>
    <style>
        .font-size-18 {
            font-size: 18px;
        }
    </style>
    <h2 class="text-center">Role Information</h2>
    <div class="container mt-4">
        <div class="row" >
            <!-- First Column -->
            <div class="col-md-6">
                <div><b class="font-size-18">Role ID: </b>{{$role->id}}</div>
                <div><b class="font-size-18">Role Name: </b>{{$role->name}}</div>
            </div>

            <!-- Second Column -->
            <div class="col-md-6">
                <div><b class="font-size-18">Role Permissions:</b></div>
                <div class="ml-3">
                    {{$role->permissions->isEmpty() ? 'No permissions added yet.' : ''}}
                    @foreach($role->permissions as $index => $permission)
                        <div><b>{{$index + 1}}</b>. {{$permission->name}}</div>
                    @endforeach
                </div>
                <a class="btn btn-primary mt-3" href="{{route('admin.role.edit', compact('role'))}}">Update this Role</a>
                <a class="btn btn-danger mt-3 ml-2" href="{{route('admin.role.delete', compact('role'))}}">Delete this Role</a>
            </div>
        </div>
    </div>
</x-app-layout>
