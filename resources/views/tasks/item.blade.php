<tr id="task-{{$task->id}}">
    <td>
        <input type="checkbox" class="check-item">
    </td>
    <td class="task-item done">
        {{$task->title}}
        <div class="row-buttons">
            <a href="" title="delete" class="btn btn-danger btn-xs">
                <i class="glyphicon glyphicon-remove"></i>
            </a>
        </div>
    </td>
</tr>