<?php

namespace Database\Seeders;

use App\Models\Blog\BlogPost;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(BlogCategoriesTableSeeder::class);
        //         \App\Models\User::factory(10)->create();
        BlogPost::factory()->count(100)->create();
    }
}
