<?php

use App\Tag;
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
        // $this->call(UserTabelSeeder::class);
        // $this->call(CategoriesTableSeeder::class);
        // $this->call(PostsTableSeeder::class);
        $this->call(Post_TagTableSeeder::class);
    }
}
