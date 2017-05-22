@extends('layouts.main')
@section('title','Ajax Todo App')
@section('content')
    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="pull-left">
                        <h1 class="header-title">Todo List</h1>
                    </div>
                    <div class="pull-right">
                        <a href="{{route('todolists.create')}}" class="btn btn-success show-todolist-modal">Create New List</a>
                    </div>
                </div>
                @include('todolists.todolistmodal')
                @include('todolists.taskmodal')
            </div>
        </div>
    </header>

    <!-- Main Container -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="alert alert-warning {{ $todolist->count() ? 'hidden' : '' }} " id="no-record-alert">
                    No record found
                </div>
                <div class="panel panel-default  {{ !$todolist->count() ? 'hidden' : '' }}">
                    <ul class="list-group" id="todo-list">
                        @foreach($todolist as $todolist)
                            @include('todolists.item',compact('$todolist'))
                        @endforeach
                    </ul>
                    <div class="panel-footer">
                        <small>{{$todolist->count()}} list items</small>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection