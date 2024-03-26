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
        <h2>Добавление задачи</h2>

    <div class="row justify-content-center"></div>
    <div class="col-4">
<form method="post" action="{{url('task')}}">
    @csrf
    <div class="mb-3">
    <label for="task_name" class="form-label">Название</label>
    <input type="text" class="form-control @error('task_name') is-invalid @enderror"
        id="task_name" name="task_name" aria-describedby="task_nameHelp" value={{ old('task_name') }}>
    <div id="task_nameHelp" class="form-text">Введите название задачи </div>
    @error('task_name')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="mb-3">
    <label for="task_description" class="form-label">Описание задачи</label>
    <input type="text" class="form-control @error('task_description') is-invalid @enderror"
           id="task_description" name="task_description" aria-describedby="task_descriptionHelp" value={{ old('task_description') }}>
    <div id="task_descriptionHelp" class="form-text">Введите описание задачи </div>
    @error('task_description')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

    <div class="mb-3">
        <label for="task_description" class="form-label">Описание задачи</label>
        <input type="text" class="form-control @error('task_description') is-invalid @enderror"
               id="task_description" name="task_description" aria-describedby="task_descriptionHelp" value={{ old('task_description') }}>
        <div id="task_descriptionHelp" class="form-text">Введите описание задачи </div>
        @error('task_description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="task_due_date" class="form-label">Дедлайн</label>
        <input type="date" class="form-control @error('task_due_date') is-invalid @enderror"
               id="task_due_date" name="task_due_date" aria-describedby="task_due_dateHelp" value={{ old('task_due_date') }}>
        <div id="task_due_dateHelp" class="form-text">Выберите срок выполнения задачи</div>
        @error('task_due_date')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="mb-3">
    <label for="user_id" class="form-label">Пользователь</label>
    <select class="form-select" id="user_id" name="user_id" aria-describedby="user_idHelp" value= {{ old('user_id') }}>
        @foreach($users as $user)
            <option value="{{$user->id}}"
                @if(old('user_id') == $user->id) selected
            @endif>{{$user->username}}
            </option>
        @endforeach
    </select>
    <div id="user_idHelp" class="form-text">Выберите пользователя для заметки</div>
    @error('user_id')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
    <button type="submit" class="btn btn-primary">Добавить</button>
</form>
</form>
    </div>
</body>
</html>

@endsection
