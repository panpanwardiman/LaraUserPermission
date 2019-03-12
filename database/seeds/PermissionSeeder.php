<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role list',
            'role create',
            'role edit', 
            'role delete',
            'user list',
            'user create',
            'user edit', 
            'user delete',
            'permission list',
            'permission create',
            'permission edit',
            'permission delete',
            'siswa list',
            'siswa create',
            'siswa edit',
            'siswa delete',
            'siswa detail',
        ];

        foreach($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
