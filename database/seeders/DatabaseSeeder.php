<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::query()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);

        $categories = [
            'Technology',
            'Health',
            'Lifestyle',
            'Education',
            'Travel',
            'Food',
            'Finance',
            'Entertainment',
        ];

        foreach ($categories as $category) {
            $category = Category::query()->create(['name' => $category]);
            Post::factory(100)->for($category)->create();
        }
    }
}
