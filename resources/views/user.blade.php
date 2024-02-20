<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-11</title>
</head>
<body>
<h2>{{$user ? "Список заметок пользователя ".$user->username : 'Неверное имя пользователя' }}</h2>
@if($user)
<table border="1">
    <thead>
    <td>id</td>
    <td>Название</td>
    <td>Описание</td>
    <td>Срок выполнения</td>
    </thead>
    @foreach ($user->tasks as $task)
        <tr>
            <td>{{$task->id}}</td>
            <td>{{$task->task_name}}</td>
            <td>{{$task->task_description}}</td>
           <td>{{$task->task_due_date}}</td>
      </tr>
    @endforeach
</table>
@endif
</body>
</html>

