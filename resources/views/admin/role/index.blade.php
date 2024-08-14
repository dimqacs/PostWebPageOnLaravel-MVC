<x-app-layout>
    <h2 class="text-center">Current Roles: </h2>
    <div>
        <a href="{{route('admin.role.create')}}" class="btn btn-primary mb-3">Create a new Role</a>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Roles</h3>
        </div>

        <div class="card-body pb-0">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th class="text-center" style="width: 70px">Id</th>
                    <th>Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td class="text-center">{{$role->id}}</td>
                        <td><a href="{{route('admin.role.show', compact('role'))}}" class="custom-link">{{$role->name}}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer clearfix d-flex justify-content-end">
            {{$roles->withQueryString()->links()}}
        </div>
    </div>
</x-app-layout>
