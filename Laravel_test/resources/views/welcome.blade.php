
@section('start')
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
@yield('styleOwn')
        <title>AbzAgency</title>
        <style>
            html, body {
                margin: 0;
                padding: 2px;
            }
            ul {
                list-style: none;
                margin-left: 5px;
                margin-bottom: 10px;
                padding-left: 15px;
            }
            li {
                padding-left: 10px;
            }
            .badge-primary {
                position: fixed;
                top:10px;
                right: 150px;
                z-index: 10;
                margin: 0 10px;
            }
            .badge-warning {
                position: fixed;
                top:10px;
                right: 20px;
                z-index: 10;
                margin: 0 10px;
            }
            .badge-info {
                position: fixed;
                top:10px;
                right: 200px;
                z-index: 10;
                margin: 0 10px;
            }

            .badge-span {
                background-color: greenyellow;
                border-radius: 20px;
            }
        </style>
    </head>
    <body>
@show

@if(isset(Auth::user()->name))
    <span class="badge badge-info">Здравствуйте {{Auth::user()->name}}</span>
@endif

@section('refAllEmployee')
    @if(isset(Auth::user()->name))
        <a href="employees" class="badge badge-primary">Все сотрудники</a>
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault();
           document.getElementById('logout-form').submit();" class="badge badge-warning">
           Выйти
        </a>
    @else <a href="home" class="badge badge-warning">Войти</a>

    @endif
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
@show('refAllEmployee')

@section('end')
    </body>
</html>
@show
