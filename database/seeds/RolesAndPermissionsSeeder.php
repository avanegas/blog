<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        Permission::create(['name' => 'Create Post']);
        Permission::create(['name' => 'Edit Post']);
        Permission::create(['name' => 'Delete Post']);
        Permission::create(['name' => 'Publish Post']);
        Permission::create(['name' => 'Unpublish Post']);
        Permission::create(['name' => 'Comment Post']);
        
        // create roles and assign existing permissions
        $role = Role::create(['name' => 'writer']);
        $role->givePermissionTo('Create Post');

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(['Publish Post', 'Unpublish Post']);
    }
}
