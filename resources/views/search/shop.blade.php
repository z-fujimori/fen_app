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
        @vite(['resources/css/app.css','resources/js/app.js'])
        
    </head>
    <body class="antialiased">



    <section>
        <div class="relative items-center w-full px-5 py-12 mx-auto md:px-12 lg:px-20 max-w-7xl">
                
            <div class="max-w-md p-6 mx-auto lg:text-center">
                <div class="flex items-center justify-center w-12 h-12 mx-auto text-black bg-gray-100 rounded-xl">
                ❖
                </div>
                <p class="mt-4 text-lg font-medium leading-6 text-black">
                Developer experience
                </p>
                <p class="mt-3 text-base text-gray-500">
                I am so happy, my dear friend, so absorbed in the exquisite sense of
                mere tranquil existence, that I neglect my talents.
                </p>
                <div class="flex justify-center gap-3 mt-10">
                <a class="inline-flex items-center justify-center text-sm font-semibold text-black duration-200 hover:text-blue-500 focus:outline-none focus-visible:outline-gray-600" href="#_">
                    <span> Read more &nbsp; → </span>
                </a>
                </div>
            </div>

            <div class="max-w-md p-6 mx-auto lg:text-center">
                <div class="flex items-center justify-center w-12 h-12 mx-auto text-black bg-gray-100 rounded-xl">
                ❖
                </div>
                <p class="mt-4 text-lg font-medium leading-6 text-black">
                Designers go-to app
                </p>
                <p class="mt-3 text-base text-gray-500">
                I am so happy, my dear friend, so absorbed in the exquisite sense of
                mere tranquil existence, that I neglect my talents.
                </p>
                <div class="flex justify-center gap-3 mt-10">
                <a class="inline-flex items-center justify-center text-sm font-semibold text-black duration-200 hover:text-blue-500 focus:outline-none focus-visible:outline-gray-600" href="#_">
                    <span> Read more &nbsp; → </span>
                </a>
                </div>
            </div>
            </div>
        </div>
    </section>
            



    </body>
</html>
