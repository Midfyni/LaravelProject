<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
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
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Article::factory(10)->recycle([User::factory(3)->create(), Category::factory(2)->create()])->create();
        $this->call([CategorySeeder::class, UserSeeder::class]);
        Article::factory(10)->recycle([Category::all(), User::all()])->create();
    }
}
