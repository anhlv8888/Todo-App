<div class="modal fade"  id="task-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Todo List</h4>
                <p>of <strong>To do list 1</strong></p>

            </div>
            <div class="modal-body">
                <div class="panel panel-default">
                    <table class="table">
                        <thead>
                        <td>
                            <input type="checkbox" name="check_all" id="check_all">
                        </td>
                        <td>
                            <input type="text" placeholder="Enter New Task" class="task-input">
                        </td>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <input type="checkbox" class="check-item">
                            </td>
                            <td class="task-item done">
                                The first task
                                <div class="row-buttons">
                                    <a href="" title="delete" class="btn btn-danger btn-xs">
                                        <i class="glyphicon glyphicon-remove"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr >
                            <td>
                                <input type="checkbox" class="check-item">
                            </td>
                            <td class="task-item ">
                                The second task
                                <div class="row-buttons">
                                    <a href="" title="delete" class="btn btn-danger btn-xs">
                                        <i class="glyphicon glyphicon-remove"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" class="check-item">
                            </td>
                            <td class="task-item ">
                                The third task
                                <div class="row-buttons">
                                    <a href="" title="delete" class="btn btn-danger btn-xs">
                                        <i class="glyphicon glyphicon-remove"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer clear-fix">
                <div class="pull-left">
                    <a href="#" class="btn btn-xs btn-defaultsmall ">
                        All
                    </a>
                    <a href="#" class="btn btn-xs btn-default">
                        Active
                    </a>
                    <a href="#" class="btn btn-xs btn-default">Completed</a>
                </div>
                <div class="pull-right">
                    <small>3 items left</small>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->