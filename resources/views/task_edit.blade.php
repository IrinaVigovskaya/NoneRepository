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
<input type="text" name="name" value="@if (old('name')) {{old('name')}} @else {{$task->name}} @endif"/>
@error('name')
<div class="is-invalid">{{$message}}</div>
@enderror
<br>
<label>Описание</label>
<input type="text" name="description" value="@if (old('description')) {{old('description')}} @else {{$task->description}} @endif"/>
@error('description')
<div class="is-invalid"> {{$message}}</div>
@enderror
<br>
<label>Дедлайн</label>
<input type="date" name="task_date" value="@if (old('task_date')) {{old('task_date')}} @else {{$task->task_date}} @endif"/>
@error('task_date')
<div class="is-invalid">{{$message}}</div>
@enderror
<br>
<input type="submit">
</form>
</body>
</html>
