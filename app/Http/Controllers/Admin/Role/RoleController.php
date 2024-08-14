<?php

namespace App\Http\Controllers\Admin\Role;


use App\Enums\PermissionEnum;
use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleStoreRequest;
use App\Http\Requests\RoleUpdateRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use function PHPUnit\Framework\throwException;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $roles = Role::query()->where('name', '!=', 'super-admin')->paginate(10);

        return view('admin.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $permissions = Permission::all();

        return view('admin.role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleStoreRequest $request): RedirectResponse
    {
        $this->roleService->store($request->validated());

        return redirect()->route('admin.role.index')->with('status', 'Role Created Successfully');
    }

    /**
     * Display the specified resource.
     * @throws Exception
     */
    public function show(Role $role): View
    {
        if ($role->name == RoleEnum::SUPER_ADMIN->value) {
            throw new Exception('You can not see super-admin role.');
        }

        return view('admin.role.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     * @throws Exception
     */
    public function edit(Role $role): View
    {
        if ($role->name == RoleEnum::SUPER_ADMIN->value) {
            throw new Exception('You can not edit super-admin role');
        }

        $permissions = Permission::query()->where('name', 'not like', PermissionEnum::MANAGE_ROLES->value)->get();

        return view('admin.role.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleUpdateRequest $request, Role $role): RedirectResponse
    {
        $role = Role::query()->where('name', '!=', 'super-admin')->findOrFail($role->id);

        $updatedRole = $this->roleService->update($role, $request->validated());

        return redirect()->route('admin.role.show', $updatedRole->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role): RedirectResponse
    {
        $role->delete();

        return redirect()->route('admin.role.index');
    }
}
