<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-11</title>
    <style> .is-invalid {color: red} </style>
</head>
    <body>
<h2>Добавление задачи</h2>
<form method="post" action="{{url('task')}}"/>
    @csrf
    <label>Название</label>
    <input type="text" name="name" value="{{ old('name') }}"/>
    @error('name')
    <div class="is-invalid">{{$message}}</div>
    @enderror
<br>
    <label>Описание</label>
    <input type="text" name="description" value="{{ old('description') }}"/>
    @error('description')
    <div class="is-invalid">{{$message}}</div>
    @enderror
<br>
    <label>Дедлайн</label>
    <input type="date" name="task_date" value="{{old('task_date')}}"/>
    @error('task_date')
    <div class="is-invalid">{{$message}}</div>
    @enderror
<br>
    <input type="submit">
</form>
</body>
</html>
