<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Hash;
use Illuminate\Database\Seeder;
use Route;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $routes = Route::getRoutes();

        foreach ($routes as $route) {

            $key = $route->getName();

            if ($key && !str_starts_with($key, 'generated::') && $key != 'storage.local') {

                $name = ucfirst(str_replace('.', '-', $key));

                Permission::create([
                    'key' => $key,
                    'name' => $name
                ]);
            }
        }
        $role1 = Role::create(['role' => 'Hr', 'is_active' => '1']);
        $role2 = Role::create(['role' => 'Buxgalter', 'is_active' => '1']);
        $role3 = Role::create(['role' => 'Moderator', 'is_active' => '1']);

        for ($i = 1; $i <= 10; $i++) {
            $user = User::create([
                'name' => 'User ' . $i,
                'email' => 'user' . $i . '@gmail.com',
                'password' => Hash::make('12345'),
            ]);
        }


        $permissions = Permission::pluck('id')->toArray();

        $role1->permissions()->attach($permissions);
        $role2->permissions()->attach($permissions);
        $role3->permissions()->attach($permissions);
    }
}


