// Show form addnew Or Update todo list
$('body').on('click','.show-todolist-modal',function(event){
    event.preventDefault();
    var me = $(this)
        url = me.attr('href'),
        title = me.attr('title');
     $('#todo-list-title').text(title);
     $('#todo-list-save-btn').text(me.hasClass('edit') ? 'Update' : 'Create New');
    $.ajax({
        url: url,
        dataType: 'html',
        success:function (response) {
            $('#todo-list-body').html(response);
        }
    });
    $('#todolist-modal').modal('show');
});
// Show message addnew todolist
function  showMessage(message, element) {
    var alert = element == undefined ? "#add-new-alert" : element;
    $(alert).text(message).fadeTo(1000,500).slideUp(500,function(){
        $(this).hide();
    });
}
// Count update todolist
function updateTodoListCounter() {
    var total =  $('.list-group-item').length;
    $('#todo-list-counter').text(total).next().text(total > 1 ? 'records' : 'record');
    showNoRecordMessage(total);
}
// Show message update and No record
function showNoRecordMessage(total) {
    if(total>1){
        $('#todo-list').closest('.panel').removeClass('hidden');
        $('#no-record-alert').addClass('hidden');
    }else {
        $('#todo-list').closest('.panel').addClass('hidden');
        $('#no-record-alert').removeClass('hidden');
    }
}
// do not use Enter in input
$('#todolist-modal').on('keypress',":input:not(textarea)",function(event){
   return event.keyCode != 13;
});
// Update and Create todo list
$('#todo-list-save-btn').click(function (event) {
    event.preventDefault();

    var form =$('#todo-list-body form'),
        url = form.attr('action'),
        method = form.attr('method');
    // reset error message
    form.find('.help-block').remove();
    form.find('.form-group').removeClass('has-error');
    $.ajax({
        url :url,
        method: method,
        data: form.serialize(),
        success: function (response) {
            if( method == "POST"){
                $('#todo-list').prepend(response);
                showMessage("Todo list had been created");
                form.trigger('reset');
                $('#title').focus();
                updateTodoListCounter();
            }
           else {
                var id = $('input[name=id]').val();
                if (id){
                    $('#todo-list-'+id).replaceWith(response);
                }
                $('#todolist-modal').modal('hide');
                showMessage("Todo list has been updated","#update-alert");
                updateTodoListCounter();
           }

        },
        error:function (xhr) {
            var errors = xhr.responseJSON;
            if($.isEmptyObject(errors) == false){
                $.each(errors,function (keys,value) {
                   $('#'+keys)
                       .closest('.form-group')
                       .addClass('has-error')
                       .append('<span class="help-block"><strong>'+ value+'</strong></span>')
                });
            }


        }
    });
});
// Show form Delete todo list
$('body').on('click','.show-confirm-modal',function(event){
    event.preventDefault();

     var title = $(this).attr('data-title'),
        action = $(this).attr('href');
     $('#confirm-body form').attr('action',action);
     $('#confirm-body p').html("Are you sure you want to delete todo list : <strong>"+ title +"</strong>")
    $('#confirm-modal').modal('show');
});
// Delete Todo List
$('#confirm-remove-btn').click(function (event) {
   event.preventDefault();
   var form = $('#confirm-body form'),
       url = form.attr('action');
   $.ajax({
       url: url,
       method:'DELETE',
       data:form.serialize(),
       success:function (data) {
           $('#confirm-modal').modal('hide');
           // var id = $('input[name=id]').val();
           $('#todo-list-'+ data.id).fadeOut(function () {
              $(this).remove();
               updateTodoListCounter();
               showMessage("Todo list has been deleted","#update-alert");
           });


       }
   });
});
// Show and add task of Todo List
$('body').on('click','.show-task-modal',function(event){
    event.preventDefault();

    var anchor = $(this),
        url = anchor.attr('href'),
        title = anchor.data('title'),
        action = anchor.data('action'),
        parent =anchor.closest('.list-group-item');

    $('#task-modal-subtitle').text(title);
    $('#task-form').attr('action',action);
    $('#selected-todo-list').val(parent.attr('id'));

    $.ajax({
        url:url,
        datatype:'html',
        success:function (response) {
            $('#task-table-body').html(response);
            initIcheck();
            countActiveTasks();
        }
    });
    $('#task-modal').modal('show');
});
function countAllTasksOfSelectedList() {
    var total = $('#task-table-body tr').length,
        selectedTodoListId = $('#selected-todo-list').val();

    $('#'+selectedTodoListId).find('span.badge').text(total +" "+ (total >1 ? 'tasks' : 'task'));
}

// Add new Task
$('#task-form').submit(function (e) {
    e.preventDefault();
    var form = $(this),
        action = form.attr('action');

        $.ajax({
            url:action,
            type:'POST',
            data: form.serialize(),
            success:function (response) {
                $('#task-table-body').prepend(response);
                form.trigger('reset');
                countActiveTasks();
                initIcheck();
                countAllTasksOfSelectedList();
            }
        });

});
function countActiveTasks() {
    var total = $('tr.task-item:not(:has(td.done))').length;
    $('#active-tasks-counter').text(total +" "+(total > 1 ? 'tasks' : 'task') + " left");
    
}
// Update mark of Task
function markTheTask(checkbox) {
    var url = checkbox.data('url'),
        completed = checkbox.is(":checked");

    $.ajax({
        url : url,
        type : 'PUT',
        data:{
            completed:completed,
            _token:$("input[name=_token]").val()
        },
        success:function (response) {
            if(response){
                var  nextid =checkbox.closest('td').next();
                if(completed){
                    nextid.addClass('done');
                }else {
                    nextid.removeClass('done');
                }

                countActiveTasks();
            }
        }
    });
}
function initIcheck(){
    $('input[type=checkbox]').iCheck({
        checkboxClass:'icheckbox_square-green',
        increaseArea:'20%'
    });
    $('#check_all').on('ifChecked',function(e){
        $('.check-item').iCheck('check');
    });
    $('#check_all').on('ifUnchecked',function(e){
        $('.check-item').iCheck('uncheck');
    });
    $('.check-item')
        .on('ifChecked',function (e) {
           var checkbox= $(this);
            markTheTask(checkbox);
        })
        .on('ifUnchecked',function (e) {
            var checkbox= $(this);
            markTheTask(checkbox);
        });
};
// Change completed Or Not in manage Task
$(".filter-btn").click(function (e) {
   e.preventDefault();
   var id = this.id;
   $(this).addClass('active')
       .parent()
       .children()
       .not(e.target)
       .removeClass('active');
   if (id == 'all-tasks'){
        $('tr.task-item').show();
   }else if(id == 'active-tasks'){
       $('tr.task-item:has(td.done)').hide();
       $('tr.task-item:not(:has(td.done))').show();
   }else if(id == "completed-tasks"){
       $('tr.task-item:has(td.done)').show();
       $('tr.task-item:not(:has(td.done))').hide();
   }
});
// Remove task
$('#task-table-body').on('click','.remove-task-btn',function (e) {
    e.preventDefault();
    var url = $(this).attr('href');

    $.ajax({
        url:url,
        type:'DELETE',
        data:{
            _token: $('input[name=_token]').val()
        },
        success:function (response) {
            $('#task-'+ response.id).fadeOut(function () {
                $(this).remove();
                countActiveTasks();
                countAllTasksOfSelectedList();
            });
        }

    });
});
// add input field when click button

$(document).ready(function() {
    var add_button      = $(".add_field_button"); //Add button ID with .add_field_button is button

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        var y = ++x;
        $('tbody').append("<tr><td>"+ y +"</td><td><input type='text' placeholder='Họ và Tên' name='name"+ y +"' /></td><td><select name='' id=''><option value='0'>Nam</option><option value='1'>Nữ</option></select></td><td class='remove_field'><a href='#'><i class='fa fa-2x fa-times'></i></a></td></tr>");
    });

    $('tbody').on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault();
        $(this).parent('tr').remove(); x--;
    })
});



