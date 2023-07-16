<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- CSRF Token -->
        {{-- 後の章で説明します --}}
        <mete name="csrf-token" content="{{ csrf_token() }}">
            
            {{-- 各ページごとにtitleタグを入れるために@yieldで明けておきます。 --}}
            {{-- 課題にて変更 --}}
            <title>myprofile</title>
            
            <!-- Scripts -->
            {{-- Laravel標準で用意されているJavascriptを読み込みます --}}
            <script src="{{ secure_asset('js/app.js') }}" defer></script>
            
            <!-- fONTS -->
            <link rel="dns-prefetch" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet"type="text/css">
            
            <!-- Styles -->
            {{-- Laravel標準で用意されているSSを読み込みます --}}
            <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
            {{-- この章の後半で使用するCSSを読み込みます --}}
            {{-- 課題にて変更 --}}
            <link href="{{ secure_asset('css/profile.css') }}" rel="stylesheet">
    </head>
            <body>
                <div id="app">
                    {{-- 画面上部に表示するナビゲーションバーです。 --}}
                    <nav class="navber navber-expand-md navber-dark navber-laravel">
                        <div class="container">
                            <a class="navber-brand" href="{{ url('/') }}">
                                {{ config('app.name', 'Laravel') }}
                            </a>
                            <button class="navber-toggler" type="button" data-toggle="collapse" aria-controls="navberSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navber-toggle-icon">
                            </span>
                            </button>
                                        
                            <div class="collapse navber-collapse" id="navberSupportedContent">
                                <!-- Left Side Of Navber -->
                                <ul class="navber-nav ms-auto">
                                                
                                </ul>
                                                
                                <!-- Right Side Of Navber -->
                                <ul class="navber-nav">
                                    {{-- 課題にて追記 --}}
                                    @guest
                                    <li><a class="nav-link" href="{{ route('login') }}">{{ __('messages.login') }}</a></li>
                                    @else
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            {{ __('messages.logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                        </form>
                                        </div>
                                    </li>
                                    @endguest
                                    
                                </ul>
                            </div>
                        </div>
                    </nav>
                    {{-- ここまでナビゲーションバー --}}
                    
                    <main class="py-4">
                        {{-- コンテンツをここに入れるため、@yieldで空けておきます。 --}}
                        {{--　課題にて変更 --}}
                        <h1>Myプロフィール</h1>
                    </main>
                </div>
            </body>
    </html>