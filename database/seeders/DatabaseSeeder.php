<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test Dadi',
            'email' => 'test@example.com',
            'password' => Hash::make('12345678'),
        ]);

        //category factory 2
        Category::factory(2)->create();

        //product factory 10
        Product::factory(10)->create();
    }
}
