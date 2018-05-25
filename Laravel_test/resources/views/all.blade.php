@extends('welcome')
@section('styleOwn')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
    </script>
    <script src="{{ url('js/search.js') }}" defer></script>
@show
@section('refAllEmployee')
@endsection

    <form method="get">
        <input type="text" id="text" placeholder="search">
        <div class="search_result">
            @if(isset($employeesCollection))
            <table style="text-align: center; border: 1px solid black; width: 100%;" class="table table-bordered">
                <thead>
                <th><a href="/employees/full_name">Full name</a></th>
                <th><a href="/employees/position">Position</a></th>
                <th><a href="/employees/employment_date">Employment date</a></th>
                <th><a href="/employees/salary">Salary</a></th>
                </thead>

                @foreach($employeesCollection as $item)
                    <tbody>
                    <tr>
                        <td>{{$item->full_name}}</td>
                        <td>{{$item->position}}</td>
                        <td>{{$item->employment_date}}</td>
                        <td>{{$item->salary}}</td>
                    </tr>
                    </tbody>
                @endforeach
            </table>
            @endif
        </div>
    </form>
