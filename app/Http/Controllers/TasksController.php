<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TodoList;
use App\Task;
use Carbon\Carbon;

class TasksController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$todolistId)
    {
        $this->validate($request,[
            'title'=>'required'
        ]);
        $todolist = TodoList::findOrFail($todolistId);
        $task =  $todolist->tasks()->create($request->all());

        return view('tasks.item',compact('task'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $todolistId,$id)
    {
        $task = Task::findOrFail($id);
//        dd($request['completed']);
        $task->completed_at = $request['completed'] == "true" ? Carbon::now() : Null ;
        $affecteRow = $task->update();
        echo $affecteRow;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($todolistId,$id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
//        dd($task);
        return $task;
    }
}
