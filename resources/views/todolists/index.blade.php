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
                        <a href="{{route('todolists.create')}}" class="btn btn-success show-todolist-modal" title="Create New List">Create New List</a>
                    </div>
                </div>
                @include('todolists.todolistmodal')
                @include('todolists.taskmodal')
                @include('todolists.confirmmodal')
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
                <div class="alert alert-success" id="update-alert" style="display: none;"></div>
                <div class="panel panel-default  {{ !$todolist->count() ? 'hidden' : '' }}">
                    <ul class="list-group" id="todo-list">
                        @foreach($todolist as $todolist)
                            @include('todolists.item',compact('$todolist'))
                        @endforeach
                    </ul>
                    <div class="panel-footer">
                        <small><span id="todo-list-counter">{{$todolist->count()}}</span> list items</small>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection