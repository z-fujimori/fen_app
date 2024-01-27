<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link href="{{ asset('/css/sanitize.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/style.css') }}" rel="stylesheet"> 
        
    </head>
    <body class="antialiased">
        
        <div class="center">
            <form action="/shops" method="GET" id="for">
                <select name="data[range]">
                    <optgroup label="距離半径">
                        <option value="">キョリを選択</option>
                        <option value="1">300m</option>
                        <option value="2">500m</option>
                        <option value="3">1km</option>
                        <option value="4">2km</option>
                        <option value="5">3km</option>
                </select>
                <input type="text" name="data[text]">
            <form>
        </div>


        
        <div>
            <div class="btn-margin">
                <button type="button" id="btn" class="btn btn-outline-primary btn-lg" class="center">
                    <h3>現在位置から検索</h3>
                </button>
            </div>
        </div>

        

        
        <script src="{{ asset('/js/geolocation.js')  }}"></script>
    </body>
</html>
