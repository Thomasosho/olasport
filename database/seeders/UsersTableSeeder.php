<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@afiaprime.com',
            'phone' => '00000000001',
            'password' => bcrypt('Admin009')
        ]);

        $user = User::create([
            'name' => 'User',
            'email' => 'user@afiaprime.com',
            'phone' => '00000000000',
            'password' => bcrypt('User009')
        ]);

        $admin->roles()->attach($adminRole);
        $user->roles()->attach($userRole);
    }
}
