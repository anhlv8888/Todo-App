<div class="alert alert-success" id="add-new-alert" style="display: none">

</div>

 <form action="{{$todolist->exists ? route("todolists.update",$todolist->id) : route("todolists.store")}}"
       method="{{$todolist->exists ? 'PUT' : 'POST'}}">
    {{csrf_field()}}
     <input type="hidden" name="id" value="{{$todolist->id}}" >
    <div class="form-group">
        <label for="" class="control-lable">List Name</label>
        <input type="text" name="title" class="form-control input-lg" id="title" value="{{$todolist->title}}">
    </div>
    <div class="form-group">
        <label for="" class="control-lable">Description</label>
        <textarea name="description" id="description" class="form-control" rows="2">{{$todolist->description}}</textarea>
    </div>
</form>