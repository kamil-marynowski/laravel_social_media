<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'admin']);

        $user = User::create([
            'name' => 'Admin',
            'email' => 'kamil.marynovski@gmail.com',
            'password' => Hash::make('123456'),
            'first_name' => 'Kamil',
            'last_name' => 'Marynowski'
        ]);

        $user->assignRole('admin');
    }
}
