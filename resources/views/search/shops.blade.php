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
        <link rel="stylesheet" href="{{ asset('/css/sanitize.css') }}" >
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}" > 
        
    </head>
    <body class="antialiased">
        
        
        <div class="center">
            <h2>検索一覧</h2>
        </div>
        
        <div id='shops'  class='shops'>
            <div id='shop' class='shop'>
                <div id='title' class='title'>
                </div>
                <div id='img' class='img'>
                </div>
                <divb id='body' class='body'>
                </divb>
            </div>
            @foreach ($shops[$page[0]] as $index => $shop)
                <br>
                <div class='shop'>
                    <h2 class="title text-xl">
                        aaaaa
                        {{$shop['name']}}
                    </h2>
            @endforeach        
        </div>

        <button type='button' id='bbb'>button</button>
        
        <script>
            window.LaravelPage=@json($page);
            window.LaravelShops=@json($shops);
        </script>
        <script src="{{ asset('/js/shops.js')  }}"></script>
    </body>
</html>
