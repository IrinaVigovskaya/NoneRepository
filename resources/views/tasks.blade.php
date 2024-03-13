<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-11</title>
</head>
<body>
    <h2>Список задач</h2>
    <table border="1">
        <thead>
        <td>id</td>
        <td>Название</td>
        <td>Описание</td>
        <td>Срок выполнения</td>
        <td>Пользователь</td>
        </thead>
@foreach ($tasks as $task)

            <tr>
                <td>{{$task->id}}</td>
                <td>{{$task->task_name}}</td>
                <td>{{$task->task_description}}</td>
                <td>{{$task->task_due_date}}</td>
                <td>{{$task->user_id}}</td>
                <td>
                    <a href="{{url('task/destroy/'.$task->id)}}">Удалить</a>
                    <a href="{{url('task/edit/'.$task->id)}}">Редактировать</a>
                </td>

            </tr>
    @endforeach
    </table>
    {{ $tasks->links() }}
</body>
</html>
