@extends('layout')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-11</title>
</head>

<style>
    .pagination{
        margin-left: 300px;
    }
</style>

<body>
    <br><br><br><br>
    <h2 style="text-align: center">Список задач</h2><br>
    <table border="1" class="table table-dark table-striped">
        <thead>
        <td>id</td>
        <td>Название</td>
        <td>Описание</td>
        <td>Срок выполнения</td>
        <td>Пользователь</td>
        <td></td>
        </thead>
@foreach ($tasks as $task)

            <tr>
                <td>{{$task->id}}</td>
                <td>{{$task->task_name}}</td>
                <td>{{$task->task_description}}</td>
                <td>{{$task->task_due_date}}</td>
                <td>{{$task->user_id}}</td>
                <td>
                    <a class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="{{url('task/edit/'.$task->id)}}">Редактировать</a><br>
                    <a class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="{{url('task/destroy/'.$task->id)}}" >Удалить</a>
                </td>

            </tr>
    @endforeach
    </table>
<br>
    <div class="pagination">{{ $tasks->links() }}</div>
</body>
</html>
