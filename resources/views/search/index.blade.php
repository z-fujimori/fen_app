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
        
        <div>
            <select>
                <optgroup label="距離半径">
                    <option value="">キョリを選択</option>
                    <option value="1">300m</option>
                    <option value="2">500m</option>
                    <option value="3">1km</option>
                    <option value="4">2km</option>
                    <option value="5">3km</option>
            </select>
        </div>

        
        <div class="center">
            <div class="btn-margin">
                <button id="btn" class="btn btn-outline-primary btn-lg">
                    現在位置を取得する
                </button>
            </div>
            <div class="txt-margin">
                <p>緯度：<span id="latitude">???</span><span>度</span></p>
                <p>経度：<span id="longitude">???</span><span>度</span></p>
            </div>
        </div>
        <script src="geolocation.js"></script>
        
        
        <div id='shops'  class='shops'>
                @foreach ($shops as $index => $shop)
                    <br>
                    <div class='shop'>
                        <h2 class="title text-xl">
                            aaaaa
                            {{$shop['name']}}
                        </h2>
                @endforeach        
        </div>
        

        
        <script src="{{ asset('/js/geolocation.js')  }}"></script>
    </body>
</html>
