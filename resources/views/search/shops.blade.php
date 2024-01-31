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
            @foreach ($shops as $index => $shop)
                <div class='shop'>
                    <h2 class="title text-xl">
                        {{$shop->name}}
                    </h2>
                    <p>{{$shop->access}}</p>
                </div>
                
            @endforeach        
        </div>

        <div class='paginate'>
            {{$shops->links()}}
        </div>

        <button type='button' id='bbb'>button</button>
        
        <script src="{{ asset('/js/shops.js')  }}"></script>
    </body>
</html>
