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
                    <div class="mx-auto w-full max-w-xs">
                        <label class="text-sm text-gray-800">検索範囲(キョリ範囲)</label>
                        <div class="mt-1">
                            <select  name="data[range]" class="mt-1 block w-full rounded-md border border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                <optgroup label="距離半径">
                                <option value="1">300m</option>
                                <option value="2">500m</option>
                                <option value="3">1km</option>
                                <option value="4">2km</option>
                                <option value="5">3km</option>
                            </select>
                        </div>
                    </div>
                </div>
            <form>
        </div>

        <br>

        <div>
            <div class="mx-auto w-full max-w-xs">
                <button id="btn" type="button" class="flex items-center p-2 rounded bg-green-600 hover:bg-blue-600 text-white border-blue-700 mx-1">
                    <div class="mx-1">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" viewBox="0 0 22.91 22.91" width="24" height="24" color="f7fcfe"><g id="paper-star" transform="translate(-0.545 -0.545)"><path id="Path_13" data-name="Path 13" d="M12,6.27l.6,1.26,1.35.2-.98.98.23,1.38L12,9.44l-1.2.65.23-1.38-.98-.98,1.35-.2Z" fill="none" stroke="currentColor" stroke-miterlimit="10"></path><path id="Path_14" data-name="Path 14" d="M20.59,1.5h0A1.91,1.91,0,0,1,22.5,3.41V5.32H18.68V3.41A1.91,1.91,0,0,1,20.59,1.5Z" fill="none" stroke="currentColor" stroke-miterlimit="10"></path><path id="Path_15" data-name="Path 15" d="M14.86,18.68H1.5v1.91A1.9,1.9,0,0,0,3.41,22.5H16.77a1.91,1.91,0,0,1-1.91-1.91Z" fill="none" stroke="currentColor" stroke-miterlimit="10"></path><path id="Path_16" data-name="Path 16" d="M5.32,18.68V3.41A1.9,1.9,0,0,1,7.23,1.5H20.59a1.91,1.91,0,0,0-1.91,1.91V20.59a1.9,1.9,0,0,1-1.91,1.91h0" fill="none" stroke="currentColor" stroke-miterlimit="10"></path><line id="Line_10" data-name="Line 10" x2="7.64" transform="translate(8.18 14.86)" fill="none" stroke="currentColor" stroke-miterlimit="10"></line></g></svg>                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                    </svg>
                    </div>
                    <span class="mx-2">現在位置から周囲のお店を検索！</span>
                </button>

            </div>
        </div>


        @if($shops)
        <div id='shops'  class='shops'>
            @foreach ($shops as $index => $shop)
            <section>
                <div class="relative items-center w-full px-5 py-12 mx-auto md:px-12 lg:px-20 max-w-7xl">
                    <div class="max-w-md p-6 mx-auto lg:text-center rounded bg-white">
                        <div class="flex border bg-white border-yellow-800 p-3 rounded my-3">
                            <div class="flex-shrink-0 hidden md:block mt-2">
                            <!--<div class="flex items-center justify-center w-12 h-12 mx-auto text-black bg-gray-100 rounded-xl">-->
                                <img src="{{$shop->logo_image}}">
                            </div>
                            <div class="md:ml-6">
                                <p class="mt-4 text-lg font-semibold leading-6 text-black"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                    {{$shop->name}}
                                </font></font></p>
                            </div>
                        </div>

                        <div class="rounded-full border flex items-center w-max py-1 px-3 bg-green-600 mx-1">
                            <div class="text-blue-100 mr-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <span class="text-white font-normal">{{$shop->genre}}</span>
                        </div>

                        <p class="mt-3 text-base"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                            {{$shop->access}}
                        </font></font></p>


                        <div x-data="{
                            selected: null,
                            toggle(event){
                            var collapseRef = event.currentTarget.getAttribute('aria-controls');

                            this.selected = (collapseRef !== this.selected) ? collapseRef : null;
                            },
                            isAccordionOpen(collapseRef){
                                return this.selected == collapseRef ? true : false;
                            },
                            defaultOpen(collapseRef){
                                this.selected = collapseRef;
                            }
                        }">
                        <div x-id="['accordion-item']" class="bg-white border bg-gray-300">
                            <div class="mb-0 font-sm">
                                <button x-on:click="toggle" type="button" :aria-expanded="isAccordionOpen($id('accordion-item'))" :aria-controls="$id('accordion-item')" class="flex items-center justify-between p-3 w-full focus:border focus:border-blue-200  bg-gray-300" :class="isAccordionOpen($id('accordion-item')) &amp;&amp; 'bg-blue-100 text-blue-800'" @keydown.space.prevent.stop="toggle">
                                    <span class="text-sm font-ligth">詳細を表示する</span>
                                    <span>
                                        <svg class="rotate-0 h-6 w-6 transform" :class="isAccordionOpen($id('accordion-item')) &amp;&amp; 'rotate-180'" x-transition="" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                        </span>
                                    </button>
                                </div>
                                <div :id="$id('accordion-item')" x-show="isAccordionOpen($id('accordion-item'))" x-cloack="" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="scale-y-0" x-transition:enter-end="scale-y-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="scale-y-100" x-transition:leave-end="scale-y-0" class="transition-transform ease-out overflow-hidden origin-top transform p-3">
                                    <img src="{{$shop->image_pc}}">
                                    <div class="flex my-2 text-lg font-extrabold items-center text-gray-800">
                                        <div class="flex-grow border-t-4 h-px mr-3"></div>
                                        住所
                                        <div class="flex-grow border-t-4 h-px ml-3"></div>
                                    </div>
                                    {{$shop->address}}
                                    <div class="flex my-2 text-lg font-extrabold items-center text-gray-800">
                                        <div class="flex-grow border-t-4 h-px mr-3"></div>
                                        営業時間
                                        <div class="flex-grow border-t-4 h-px ml-3"></div>
                                    </div>
                                    {{$shop->open}}
                                    <div class="flex my-2 text-lg font-extrabold items-center text-gray-800">
                                        <div class="flex-grow border-t-4 h-px mr-3"></div>
                                        定休日
                                        <div class="flex-grow border-t-4 h-px ml-3"></div>
                                    </div>
                                    {{$shop->close}}
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </section>
            @endforeach        
        </div>

        <div id='pagination' class="text-lg font-semibold">
            {{$shops->links()}}
        </div>
        @endif
        



        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
        <script src="{{ asset('/js/geolocation.js')  }}"></script>
    </body>
</html>
