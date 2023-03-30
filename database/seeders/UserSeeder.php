<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'synthex@bk.ru',
            'password' => bcrypt('123'),
            'is_admin' => 1,
        ]);

        User::factory()->count(10)
                       ->create();
    }
}
