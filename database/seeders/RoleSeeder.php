<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    protected $roles=[
        // tabla roles
        'user',
        'writer',
        'editor',
        'moderator',
        'admin',
        'super-admin',
        'Blog',
        'Contab',
        'HorTrabajo',
        ];
    protected $permissions=[
        // tabla permisos
        'access',
        'view',
        'new',
        'edit',
        'delete',
        'publish',
        'unpublish',
        'printer',
        'export',
        ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create permissions
        foreach ($this->permissions as $key => $value) {
            $permissions[]=Permission::create(['name'=>$value]);
        }

        // create roles and assign created permissions
        foreach ($this->roles as $key => $value) {
            $role=  Role::create(['name'=>$value]);
            // if ($value=='super-admin') {
            //     // dd($value);
            //     $role->givePermissionTo($permissions);
            // }
        }


        // $role = Role::create(['name' => 'writer']);
// $permission = Permission::create(['name' => 'edit articles']);
// Se puede asignar un permiso a un rol mediante uno de estos métodos:

// $role->givePermissionTo($permission);
// $permission->assignRole($role);
// Se pueden sincronizar varios permisos con un rol mediante uno de estos métodos:

// $role->syncPermissions($permissions);
// $permission->syncRoles($roles);
// Se puede eliminar un permiso de un rol mediante uno de estos métodos:

// $role->revokePermissionTo($permission);
// $permission->removeRole($role);
    }
}
