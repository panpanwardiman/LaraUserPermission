<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
            'name' => 'admin'
        ]);

        $userId = $role->users->pluck('id')->toArray();

        $user = User::find($userId);
        
        $permissions = Permission::pluck('name')->toArray();

        $role->syncPermissions($permissions);
        $user->syncPermissions($permissions);
    }
}
