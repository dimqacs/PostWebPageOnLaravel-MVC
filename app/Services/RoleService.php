<?php

namespace App\Services;

use Spatie\Permission\Models\Role;

class RoleService
{
    public function store($data): void
    {
        $permissions = $data['permissions'] ?? [];
        unset($data['permissions']);

        $role = new Role($data);
        $role->save();

        $role->permissions()->attach($permissions);
    }

    public function update($role, $data): Role
    {
        $permissions = $data['permissions'] ?? [];
        unset($data['permissions']);

        $role->update($data);
        $role->permissions()->sync($permissions);

        return $role;
    }
}
