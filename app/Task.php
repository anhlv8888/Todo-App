<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected  $fillable = ["title",'todo_list_id',"completed_at"];
    public function todolist(){
        return $this->belongsTo(Task::class);
    }
}
