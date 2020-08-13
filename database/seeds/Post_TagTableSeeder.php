<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Post_TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_tag')->insert([
            'post_id'=> 1,
            'tag_id'=> 2,
        ]);
    }
}
