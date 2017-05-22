<?php

use Illuminate\Database\Seeder;

class TodoListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todo_lists')->truncate();
        $todolists = [];
        for ($i = 0;$i <10 ;$i++)
        {
            $todolists[] =[
              'title' => "Todo list {$i}",
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut deserunt fugit illum maxime quibusdam sint vero. Aliquam aperiam delectus mollitia obcaecati!
                 Cupiditate distinctio eligendi facilis maiores quidem quos tempore velit.',
                'user_id' => rand(1,3),
                'created_at'=>new DateTime(),
                'updated_at'=>new DateTime()
            ];
        }
        DB::table('todo_lists')->insert($todolists);
    }
}
