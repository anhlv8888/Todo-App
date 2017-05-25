<?php $count = $todolist->tasks->count() ?>
<li class="list-group-item" id="todo-list-{{$todolist->id}}">
    <h4 class="list-group-item-heading">{{$todolist->title}} <span class="badge">{{$count}} {{ $count >1 ? 'tasks' : 'task' }}</span></h4>
    <p class="list-group-item-text">{{$todolist->description}}</p>
    <div class="buttons">
        <a href="{{route("todolists.show",$todolist->id)}}" data-action="{{ route('todolists.tasks.store',$todolist->id) }}" title="manage" data-title="{{$todolist->title}}"  class="btn btn-info btn-xs show-task-modal">
            <i class="glyphicon glyphicon-ok"></i>
        </a>
        <a href="{{route('todolists.edit',$todolist->id)}}" title="Edit {{$todolist->title}}" class="btn btn-default btn-xs show-todolist-modal edit">
            <i class="glyphicon glyphicon-edit"></i>
        </a>
        <a href="{{route('todolists.destroy',$todolist->id)}}" title="delete" class="btn btn-danger btn-xs show-confirm-modal" data-title="{{$todolist->title}}">
            <i class="glyphicon glyphicon-remove"></i>
        </a>
    </div>
</li>