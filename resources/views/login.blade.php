<!DOCTYPE html>
<header>
    <meta charset="UTF-8">

</header>
<style>
    .exit_class{
       margin-left: 980px;
    }

    .login_form{
        position: fixed;
       margin-left: 43%;
        margin-top: 7%;
    }

    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh; /* Установите минимальную высоту во всю высоту видимой области окна */
        margin: 0;
    }

    .footer{
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
    }

</style>

<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>609-11</title>
    <style> .is-invalid {color: red} </style>
</head>
<header>

@if(!Auth::user())
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Folium</a>
            </div>
        </nav>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <br><br><br>

    <div class="login_form">
        <h2>Вход в систему</h2>
    <form class="d-flex" method="post" action="{{url('auth')}}">
    @csrf
        <div class="mb-3">
        <label for="username" class="form-label">Логин</label>
        <input class="form-control me-2" type="text" name="username" aria-label="Логин"
               value="{{ old('username') }}"/><br>
        <label for="password" class="form-label">Пароль</label>
        <input class="form-control me-2" type="password" name="password" aria-label="Пароль"
               value="{{ old('password') }}"/><br>
        <button class="btn btn-outline-dark" type="submit">Войти</button>
        </div>
    </form>
    </div>

    @else
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
                        <div class="exit_class">
                            <ul class="navbar-nav">
                                <li><a class="nav-link active" href="#"><i style="color:black;"></i>
                                        {{ Auth::user()->username }}</a></li>
                                <li class="li_button"> <a class="btn btn-outline-light" href="{{url('logout')}}" style="margin-left: 10px">Выйти</a></li>
                            </ul>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
@endif
</header>
<div class="footer">
@include('footer')
</div>
</html>
