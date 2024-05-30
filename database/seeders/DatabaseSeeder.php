<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat peran
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        // Membuat izin
        $viewAdminDashboard = Permission::create(['name' => 'editor admin']);
        $viewUserDashboard = Permission::create(['name' => 'editor user']);

        // Memberikan izin ke peran
        $adminRole->givePermissionTo($viewAdminDashboard);
        $userRole->givePermissionTo($viewUserDashboard);

        $admin = User::create([
            'name'=>'lucy',
            'email'=>'lucy@gmail.com',
            'password'=> Hash::make('lucy123'),    
        ]);

        $user1 = User::create([
            'name'=>'adit',
            'email'=>'adit@gmail.com',
            'password'=> Hash::make('adit123'),
        ]);

        $user2 = User::create([
            'name'=>'budi',
            'email'=>'budi@gmail.com',
            'password'=> Hash::make('budi123'),
        ]);

        $user3 = User::create([
            'name'=>'joni',
            'email'=>'joni@gmail.com',
            'password'=> Hash::make('joni123'),
        ]);

        // assign role
        $admin->assignRole($adminRole);
        $user1->assignRole($userRole);
        $user2->assignRole($userRole);
        $user3->assignRole($userRole);

        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
