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
    <input type="text" name="task_name" value="{{ old('task_name') }}"/>
    @error('task_name')
    <div class="is-invalid">{{$message}}</div>
    @enderror
<br>
    <label>Описание</label>
    <input type="text" name="task_description" value="{{ old('task_description') }}"/>
    @error('task_description')
    <div class="is-invalid">{{$message}}</div>
    @enderror
<br>
    <label>Дедлайн</label>
    <input type="date" name="task_due_date" value="{{old('task_due_date')}}"/>
    @error('task_due_date')
    <div class="is-invalid">{{$message}}</div>
    @enderror
<br>
    <label>Пользователь</label>
    <select name="user_id" value="{{old('user_id')}}">
        @foreach($users as $user)
            <option value="{{$user->id}}"
                @if(old('user_id') == $user->id) selected
            @endif>{{$user->username}}
            </option>
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
