<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Helpers\Status;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ModuleRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Modules
        foreach ($this->getPermissionData() as $guard => $value) {
            foreach ($value['modules'] as $index => $module) {
                Module::firstOrCreate(
                    [
                        'name' => $module['name'],
                        'guard_name' => $guard,
                        'order' => $index,
                        'status' => Status::STATUS_ACTIVE,
                    ]
                );
            }
        }

        // Roles
        foreach ($this->getRoleData() as $values) {
            $role = Role::firstOrCreate([
                'name' => $values['name'],
                'guard_name' => $values['guard_name']
            ]);
        }

        // Permissions
        $modules = Module::query()->get();

        foreach ($this->getPermissionData() as $guard => $value) {

            if (Role::where('guard_name', $guard)->exists()) {

                foreach ($value['modules'] as $module) {

                    foreach ($module['action'] as $action) {

                        $module_id = $modules->where('name', $module['name'])->first()->id;

                        $permission = Permission::firstOrCreate([
                            'name' => strtolower($module['name']) . '.' . $action,
                            'guard_name' => $guard,
                            'module_id' => $module_id,
                        ]);

                        $role->givePermissionTo($permission);
                    }
                }
            }
        }

    }

    public function getRoleData()
    {
        return [
            [
                'name' => 'super_admin',
                'guard_name' => 'admin'
            ]
        ];
    }

    public function getPermissionData()
    {
        return [
            'admin' => [
                'modules' => [
                    [
                        'name' => 'client',
                        'action' => ['create', 'read', 'update', 'delete']
                    ],
                    [
                        'name' => 'admin',
                        'action' => ['create', 'read', 'update']
                    ],
                ]
            ]
        ];
    }
}
