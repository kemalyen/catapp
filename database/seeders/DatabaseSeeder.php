<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Role::query()->truncate();
        User::query()->truncate();
        Image::query()->truncate();
         
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'User']);

        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'),
            'remember_token' => Str::random(10),
        ]);

        $user = User::whereEmail('admin@example.com')->first();
        $user->assignRole('Admin');

        User::create([
            'name' => 'User',
            'username' => 'demo',
            'email' => 'demo@example.com',
            'password' => Hash::make('demo'),
            'remember_token' => Str::random(10),
        ]);

        $user = User::whereEmail('demo@example.com')->first();
        $user->assignRole('User');

        Image::create(['path' => 'cat.jpg', 'description' => 'This is a sample <b>description</b> with styles!']);
    }
}
