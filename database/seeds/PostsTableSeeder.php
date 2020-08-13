<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            ['user_id' => 1,
             'category_id' => 1,
             'title' => 'Title1',
             'content' => 'test',
            ],
            ['user_id' => 1,
            'category_id' => 1,
            'title' => 'Title2',
            'content' => 'test2',
            ],
            ['user_id' => 1,
            'category_id' => 1,
            'title' => 'Title3',
            'content' => 'test3',
            ]
        ]);
    }
}
