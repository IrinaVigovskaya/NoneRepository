<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-11</title>
    <style> .is-invalid {color: red} </style>
</head>
<body>
<h2>Редактирование задачи</h2>
<form method="post" action="{{url('task/update/'.$task->id)}}"/>
@csrf
<label>Название</label>
<input type="text" name="task_name" value="@if (old('task_name')) {{old('task_name')}} @else {{$task->task_name}} @endif"/>
@error('task_name')
<div class="is-invalid">{{$message}}</div>
@enderror
<br>
<label>Описание</label>
<input type="text" name="task_description" value="@if (old('task_description')) {{old('task_description')}} @else {{$task->task_description}} @endif"/>
@error('task_description')
<div class="is-invalid"> {{$message}}</div>
@enderror
<br>
<label>Дедлайн</label>
<input type="date" name="task_due_date" value="@if (old('task_due_date')) {{old('task_due_date')}} @else {{$task->task_due_date}} @endif"/>
@error('task_due_date')
<div class="is-invalid">{{$message}}</div>
@enderror
<br>
<label>Пользователь</label>
<select name="user_id" value="{{old('user_id')}}">
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
<input type="submit">
</form>
</body>
</html>
