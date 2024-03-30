<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>609-11</title>
    <style> .is-invalid {color: red} </style>
</head>
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Folium</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" aria-current="page" data-bs-toggle="dropdown"
                       href={{ url('task') }}>Задачи</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href={{url('task')}}>Все задачи</a></li>
                        <li><a class="dropdown-item" href={{url('task/create')}}>Добавить задачу</a></li>
                        <li><hr class="dropdown-divider"></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Пользователи</a>
                </li>
            </ul>
        </div>
        </div>
    </nav>
@if(!Auth::user())
    <h2>Вход в систему</h2>
    <form class="d-flex" method="post" action="{{url('auth')}}">
    @csrf
        <input class="form-control me-2" type="text" placeholder="Логин" name="username" aria-label="Логин"
               value="{{ old('username') }}"/>
        <input class="form-control me-2" type="password" placeholder="Пароль" name="password" aria-label="Пароль"
               value="{{ old('password') }}"/>
        <button class="btn btn-outline-success" type="submit">Войти</button>
    </form>
    @else
        <ul class="navbar-nav">
            <li><a class="nav-link active" href="#"><i style="font-size:70px; color:black;"></i>
                    {{ Auth::user()->username }}</a></li>
            <li><a class="btn btn-outline-success my-2 my-sm-0" href="{{url('logout')}}">Выйти</a></li>
        </ul>
@endif
</header>
</html>
