<?php

namespace Database\Seeders;

use App\Models\User;
use App\Helpers\Status;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::updateOrCreate(
            [
                'email' => 'smallvi@gmail.com',
                'type' => 'admin'
            ],
            [
                'name' => 'Super Admin',
                'status' => Status::STATUS_ACTIVE,
                'password' => 'Password@123'
            ]
        );

        $role = Role::where('name', 'super_admin')->first();
        $user->assignRole($role);
    }
}
