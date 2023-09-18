<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $adminRole = Role::create(['name' => 'Admin']);
        $userRole = Role::create(['name' => 'User']);
        $guestRole = Role::create(['name' => 'Guest']);

        
       

        $createPostPermission = Permission::create(['name' => 'create_post']);
        $readPostPermission = Permission::create(['name' => 'read_post']);
        $deletePostPermission = Permission::create(['name' => 'delete_post']);
        $addCommentPermission = Permission::create(['name' => 'add_comment']);
        $deleteCommentPermission = Permission::create(['name' => 'delete_comment']);
        // $addUserPermission=Permission::create(['name' => 'Add_User']);
        $DeleteUserPermission=Permission::create(['name' => 'delete_User']);
        $readUserPermission=Permission::create(['name' => 'read_user']);
        $editUserPermission=Permission::create(['name'=>'edit_user']);
        $readCommentPermission=Permission::create(['name'=>'read_comment']);

        $adminRole->syncPermissions(Permission::all());
        $userRole->syncPermissions(['create_post', 'read_post', 'delete_post','add_comment','delete_comment','read_comment']);
        $guestRole->syncPermissions(['add_comment','read_comment']);
    }
}
