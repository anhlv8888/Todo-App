<li class="list-group-item">
    <h4 class="list-group-item-heading">{{$todolist->title}} <span class="badge">0 tasks</span></h4>
    <p class="list-group-item-text">{{$todolist->description}}</p>
    <div class="buttons">
        <a href="" title="Manage Tasks" class="btn btn-info btn-xs show-task-modal">
            <i class="glyphicon glyphicon-ok"></i>
        </a>
        <a href="" title="update" class="btn btn-default btn-xs show-todolist-modal">
            <i class="glyphicon glyphicon-edit"></i>
        </a>
        <a href="" title="delete" class="btn btn-danger btn-xs">
            <i class="glyphicon glyphicon-remove"></i>

        </a>
    </div>
</li>