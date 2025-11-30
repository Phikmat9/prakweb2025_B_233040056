<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 5 Users
        $users = \App\Models\User::factory(5)->create();

        // 2 Categories
        $categories = \App\Models\Category::factory(2)->create();

        // 10 Posts
        \App\Models\Post::factory(10)->create([
            'user_id' => $users->random()->id,
            'category_id' => $categories->random()->id
        ]);

        Category::factory(5)->create();

        Post::factory(50)->recycle(User::all())->recycle(Category::all())->create();
        
    }
}
