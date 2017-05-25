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
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        DB::table('tasks')->truncate();
        DB::table('todo_lists')->truncate();
        $todolists = [];
        $tasks =[];
        for ($i = 1;$i <= 15 ;$i++)
        {
            $date = date("Y-m-d H:i:s",strtotime("2016-05-01 08:00:00 + {$i} days"));
            $todolists[] =[
                'id'=>$i,
              'title' => "Todo list {$i}",
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut deserunt fugit illum maxime quibusdam sint vero. Aliquam aperiam delectus mollitia obcaecati!
                 Cupiditate distinctio eligendi facilis maiores quidem quos tempore velit.',
                'user_id' => rand(1,3),
                'created_at'=>$date,
                'updated_at'=>$date
            ];
            for ($j = 1;$j <= rand(1,5);$j++){
                $taskdate = date("Y-m-d H:i:s",strtotime("{$date} + {$j} minutes"));
                $tasks[] = [
                    'todo_list_id' => $i,
                    'title' => "The Task {$j} of todo list {$i}",
                    'created_at'=>$taskdate,
                    'updated_at'=>$taskdate,
                    'completed_at'=>rand(0,1) == 0 ? Null : $date
                ];
            }
        }
        DB::table('todo_lists')->insert($todolists);
        DB::table('tasks')->insert($tasks);
    }
}
