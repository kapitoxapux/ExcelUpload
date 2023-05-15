<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->

</head>
<body class="font-sans antialiased">
<style>
    body {
        background-color: #d5d5d5;
    }
    .row-list {
        list-style-type: none;
        padding: .5rem;
    }
    .row-title {
        border-bottom: 1px solid black;
    }
    .row-content span {
        border-right: 1px solid black;
    }
    .row-title,.row-content {
        display: flex;
        /*padding: .25rem 0;*/
        max-width: 477px;
    }
    .row-title span,.row-content span {
        padding: 0 .25rem;
        min-width: 150px;
        background-color: #d5d5d5;
    }


</style>
    <div class="container">
        @if(is_array($rows) && empty($rows))
            <p>Нет данных... Загрузите файл.</p>
        @else
            <ul class="row-list">
                <li class="row-title"><span>Id</span><span>Name</span><span>Date</span></li>
                @foreach ($rows as $key => $row)
                    @if(is_array($row) && count($row) > 3)
                        @foreach ($row as $itm)
                            <li class="row-content"><span>{{$itm["id"]}}</span><span>{{$itm["name"]}}</span><span>{{$itm["date"]}}</span></li>
                        @endforeach
                    @else
                        <li class="row-content"><span>{{ $row["id"] }}</span><span>{{ $row["name"] }}</span><span>{{ $row["date"] }}</span></li>
                    @endif
                @endforeach
            </ul>
        @endif
    </div>
</body>
</html>
