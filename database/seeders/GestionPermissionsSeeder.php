<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class GestionPermissionsSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

       // create permissions
        Permission::create(['name' => 'crud articles']);
        Permission::create(['name' => 'crud films']);
        Permission::create(['name' => 'publish articles']);
        Permission::create(['name' => 'unpublish articles']);
        Permission::create(['name' => 'crud user']);
        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'journaliste']);
        $role1->givePermissionTo('crud articles');
        $role1->givePermissionTo('crud films');

        $role2 = Role::create(['name' => 'redacteur']);
        $role2->givePermissionTo('publish articles');
        $role2->givePermissionTo('unpublish articles');

        $role3 = Role::create(['name' => 'drh']);
        $role3->givePermissionTo('crud user');

        $role4 = Role::create(['name' => 'admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'journaliste1',
            'email' => 'journaliste1@example.com',
            'password' => bcrypt('12345678'),
        ]);
        $user->assignRole($role1);
        $user = \App\Models\User::factory()->create([
            'name' => 'journaliste2',
            'email' => 'journaliste2@example.com',
            'password' => bcrypt('12345678'),
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'redacteur1',
            'email' => 'redacteur1@example.com',
            'password' => bcrypt('12345678'),
        ]);
        $user->assignRole($role1);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'redacteur2',
            'email' => 'redacteur2@example.com',
            'password' => bcrypt('12345678'),
        ]);
        $user->assignRole($role2);


        $user = \App\Models\User::factory()->create([
            'name' => 'drh1',
            'email' => 'drh11@example.com',
            'password' => bcrypt('12345678'),
        ]);
        $user->assignRole($role3);

        $user = \App\Models\User::factory()->create([
            'name' => 'admin1',
            'email' => 'admin1@example.com',
            'password' => bcrypt('12345678'),
        ]);
        $user->assignRole($role4);    }
}
