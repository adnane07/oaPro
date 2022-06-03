<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- flatpickr -->
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_green.css">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
  <header>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <ul class="nav nav-pills">
                    <li class="nav-item dropdown">
                      <a class="nav-link" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i class="bi bi-list" style="font-size: 2rem; color:green"></i></a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Separated link</a></li>
                      </ul>
                    </li>

                </ul>
                <a class="navbar-brand" 
                href=
                @guest
                @if (Route::has('login'))
                {{ url('/') }}
                @endif
                @else 
                 @if(Auth::user()->isAdmin)
                 {{ Route('AdminInt') }} 
                 @endif
                 
                @endguest  >
                    OASIS GARDEN
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('gerer') }}">
                                <img src="https://img.icons8.com/ios/30/000000/two-tickets.png "/>
                                 {{ __('Gérer la reservation') }}
                            </a>
                        </li>

                        @guest

                            @if (Route::has('login'))

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">
                                        <img src="https://img.icons8.com/wired/30/000000/login-rounded-right.png"/>
                                         {{ __('Se Connecter') }}
                                    </a>
                                </li>

                            @endif

                            @else
                            
                                
                                @if(Auth::user()->isAdmin)
                        
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('gerer') }}">
                                        <img src="https://img.icons8.com/external-inipagistudio-mixed-inipagistudio/
                                        28/000000/external-history-business-analytics-inipagistudio-mixed-inipagistudio.png"/>
                                         {{ __('Historique de Reservation') }}
                                    </a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('edit') }}">
                                        <img src="https://img.icons8.com/dotty/29/undefined/edit-calendar.png"/>
                                         {{ __('Parametres') }}
                                    </a>
                                </li>
                                    
                                @endif
                                
                                <li class="nav-item dropdown">
                                
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <img src="https://img.icons8.com/bubbles/35/000000/user.png"/>
                                     {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
  </header>


    <main class="py-4" style="margin-bottom: 3cm">

            @yield('content')

    </main>


  <footer class="fixed-bottom" style="">

    <div id="app" >
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">

                <div>
                 <table>
                  <tr>
                    <th><img src="https://img.icons8.com/ios/18/000000/place-marker--v1.png " /></th>
                    <th> <a style="text-decoration: none; color:black"
                        target="_blank"
                        href="https://www.google.com/maps/place/Espace+Oasis/@33.0215191,-7.62312,17z/data=!4m5!3m4!1s0xda605ba11e0ea21:0x89fcd14e1598df5!8m2!3d33.0218654!4d-7.6230449">
                        route casablanca settat, 26000 Settat, Maroc</a> </th>
                  </tr>
                  <tr>
                    <th><img  src = " https://img.icons8.com/external-dreamstale-lineal-dreamstale/18/000000/external-telephone-communication-dreamstale-lineal-dreamstale-1.png " /></th>
                    <th> <a style="text-decoration: none; color:black" href="tel:+212687607407">06 87 60 74 07</a></th>
                  </tr>

                 </table>
                </div>
        <div>
                   <!-- Button trigger modal -->
                  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      Nous Contactez
                  </button>

          </div>
        </div>
        </nav>


        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">

                <div class="container" style="justify-content: space-between">
                    <div>

                          Copyright  &copy  2022

                     </div>

                    <div>
                        <a target="_blank" href="https://www.instagram.com">
                            <img src="https://img.icons8.com/ios/20/000000/instagram-new--v1.png"/></a>
                        <a target="_blank" href="https://web.facebook.com/oasisgarden2/">
                            <img src="https://img.icons8.com/ios/20/000000/facebook-new.png"/></a>
                        <a target="_blank" href="https://www.youtube.com">
                            <img src="https://img.icons8.com/ios/25/000000/youtube-play--v1.png"/></a>
                    </div>

                    <div>
                      OASIS.GARDEN
                     </div>
                </div>
        </nav>
    </div>
  </footer>
</html>
