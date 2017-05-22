<form action="{{route('todolists.store')}}">
    {{csrf_field()}}
    <div class="form-group">
        <label for="" class="control-lable">List Name</label>
        <input type="text" name="title" class="form-control input-lg" id="title">
    </div>
    <div class="form-group">
        <label for="" class="control-lable">Description</label>
        <textarea name="description" id="description" class="form-control" rows="2"></textarea>
    </div>
</form>