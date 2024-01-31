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
        @vite(['resources/css/app.css','resources/js/app.js'])
        
    </head>
    <body class="antialiased">
        
        <div class="center">
            <form action="/redord" method="POST" id="for" enctype="multipart/form-data">
                <div>
                    @csrf
                    <select name="data[range]">
                    <optgroup label="距離半径">
                        <option value="1">300m</option>
                        <option value="2">500m</option>
                        <option value="3">1km</option>
                        <option value="4">2km</option>
                        <option value="5">3km</option>
                </select>
                <input type="text" name="data[text]">
                </div>
            <form>
        </div>

        <div>
            <div class="btn-margin">
                <button type="button" id="btn" class="btn btn-outline-primary btn-lg" class="center">
                    <h3>現在位置から検索</h3>
                </button>
            </div>
        </div>


        @if($shops)
        <div id='shops'  class='shops'>
            @foreach ($shops as $index => $shop)
            <section>
                <div class="relative items-center w-full px-5 py-12 mx-auto md:px-12 lg:px-20 max-w-7xl">
                  <div class="grid w-full grid-cols-1 mx-auto lg:grid-cols-2">
                    <div class="max-w-md p-6 mx-auto lg:text-center">
                      <div class="flex items-center text-black">
                      <!--<div class="flex items-center justify-center w-12 h-12 mx-auto text-black bg-gray-100 rounded-xl">-->
                      <img src="{{$shop->logo_image}}">
                    </div>
                      <p class="mt-4 text-lg font-medium leading-6 text-black"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                        {{$shop->name}}
                      </font></font></p>
                      <p class="mt-3 text-base text-gray-500"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                        {{$shop->access}}
                      </font></font></p>
                      <div class="flex justify-center gap-3 mt-10">
                        <a class="inline-flex items-center justify-center text-sm font-semibold text-black duration-200 hover:text-blue-500 focus:outline-none focus-visible:outline-gray-600" href="#_">
                          <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">詳細を読む＞</font></font></span>
                        </a>
                      </div>
                  </div>
                </div>
              </section>
            @endforeach        
        </div>

        <div class='paginate'>
            {{$shops->links()}}
        </div>
        @endif
        

        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
        <script src="{{ asset('/js/geolocation.js')  }}"></script>
    </body>
</html>
