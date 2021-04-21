<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script defer src="{{ asset('js/app.js') }}"></script>

    <!-- defer specifies that the script is executed when the page has finished parsing -->

  
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">




    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            
                            
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('employer.register') }}">{{ __('Employer Register') }}</a>
                                </li>
                            
                            
                                @if (Route::has('login'))

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Job Seeker Register') }}</a>
                                </li>
                            @endif
                        @else
                        @if(Auth::user()->user_type=='employer')

<li>
    <a href="{{route('job.create')}}"><button class="btn btn-secondary">Post a job</button></a>
</li>
@endif
                            <li class="nav-item dropdown">


                            
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   @if(Auth::user()->user_type=='employer')
                                   <!-- if your the authenticated user/employer -->
                                   {{Auth::user()->company->cname}}
 
                                   <!-- display the company cname -->
                                   

                                   @else
                                    {{ Auth::user()->name }}
                                    <!-- if not display the autneticated users name -->
                                    @endif
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  @if(Auth::user()->user_type=='employer')
                                  <!-- if your the athenticated employer  display content below -->
                                <a class="dropdown-item" href="{{ route('company.view') }}">
                                       
                                        {{ __('Company') }}
                                    </a>

                                    <a class="dropdown-item" href="{{route('my.job')}}">
                                    My Jobs


                                    </a>

                                    <a class="dropdown-item" href="{{route('applicant')}}">Applicants</a>

                                    @else
                                    <!-- if not display this content below -->
                                    <a class="dropdown-item" href="{{ route('user.profile') }}">
                                       
                                        {{ __('profile') }}
                                    </a>
                                    @endif
                                  <!-- this will add a new drop down menu tab named company  -->
                                  
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
