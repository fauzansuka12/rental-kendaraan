<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create([
            'name' => 'admin'
        ]);
        $pelanggan = Role::create([
            'name' => 'pelanggan'
        ]);
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'telephone' => '+6283857200024',
            'password' => bcrypt('admin123'),
        ]);

        $user->assignRole($admin);
    }
}
