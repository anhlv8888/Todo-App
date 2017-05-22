<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('users')->insert([
            [
                'name'=>'anhlv1',
                'email'=>'anhlv1@gmail.com',
                'password'=>bcrypt('nji9')
            ],
            [
                'name'=>'anhlv2',
                'email'=>'anhlv2@gmail.com',
                'password'=>bcrypt('nji9')
            ],
            [
                'name'=>'anhlv3',
                'email'=>'anhlv3@gmail.com',
                'password'=>bcrypt('nji9')
            ],
        ]);
    }
}
