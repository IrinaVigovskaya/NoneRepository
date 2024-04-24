@extends('layout')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-11</title>
    <style> .is-invalid {color: red} </style>
</head>
<body>
<br><br><br>
<div class="row justify-content-center">
<div class="col-4">
    <br>
    <h2>Редактирование задачи</h2><br>
    <form method="post" action="{{url('task/update/'.$task->id)}}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Название</label>
            <input class="form-control @error('task_name') is-invalid @enderror" type="text" name="task_name" value="@if (old('task_name')) {{old('task_name')}} @else {{$task->task_name}} @endif"/>
            @error('task_name')
            <div class="is-invalid">{{$message}}</div>
            @enderror
            <br>
        </div>
        <div class="mb-3">
            <label class="form-label">Описание</label>
            <input class="form-control @error('task_description') is-invalid @enderror" type="text" name="task_description" value="@if (old('task_description')) {{old('task_description')}} @else {{$task->task_description}} @endif"/>
            @error('task_description')
            <div class="is-invalid"> {{$message}}</div>
            @enderror
            <br>
        </div>
        <div class="mb-3">
            <label class="form-label">Дедлайн</label>
            <input class="form-control @error('task_due_date') is-invalid @enderror" type="date" name="task_due_date" value="@if (old('task_due_date')) {{old('task_due_date')}} @else {{$task->task_due_date}} @endif"/>
            @error('task_due_date')
            <div class="is-invalid">{{$message}}</div>
            @enderror
            <br>
        </div>
        <div class="mb-3">
            <label class="form-label">Пользователь</label>
            <select class="form-select" name="user_id" value="{{old('user_id')}}">
                @foreach($users as $user)
                    <option value="{{$user->id}}"
                            @if(old('user_id'))
                                @if(old('user_id') == $user->id) selected @endif
                            @else
                                @if($task->user_id == $user->id) selected @endif
                        @endif>{{$user->username}}</option>
                @endforeach
            </select>
            @error('user_id')
            <div class="is-invalid">{{$message}}</div>
            @enderror
            <br>
        </div>
        <button type="submit" class="btn btn-outline-dark">Изменить</button>
    </form>
</div>
</div>
</body>
</html>
