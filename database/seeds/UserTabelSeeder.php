<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'name' => 'test',
        //     'email' => 'a@b',
        //     //セキュリティーの強化
        //     'password' => bcrypt('test'),
        // ]);
    }
}