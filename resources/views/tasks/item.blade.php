<tr class="task-item" id="task-{{$task->id}}">


    <td>
        <input type="checkbox" data-url="  {{route('todolists.tasks.update',[$task->todolist->id,$task->id])}}" {{is_null($task->completed_at) ?:'checked=true'}} class="check-item">
    </td>
    <td class="task-item-title {{$task->getCompletedAttribute() ? :'done'}}">
        {{$task->title}}
        <div class="row-buttons">
            <a href="{{ route('todolists.tasks.destroy',[$task->todolist->id,$task->id]) }}" title="delete" class="btn btn-danger btn-xs remove-task-btn">
                <i class="glyphicon glyphicon-remove"></i>
            </a>
        </div>
    </td>
</tr>