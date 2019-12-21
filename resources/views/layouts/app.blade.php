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
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body id="page-top">

    <div id="app">

        <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
            

            <a class="navbar-brand mr-1" href="{{ url('/') }}">Yundo Exam</a>
        
            
            <!-- Navbar Search -->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
              
            </form>
        
            <!-- Navbar -->
            <ul class="navbar-nav ml-auto ml-md-0">
            
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-user-circle fa-fw"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
               </a>

               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                   @csrf
               </form>
                </div>
              </li>
            </ul>

        </nav>


        <div id="wrapper">

      

            <!-- Sidebar -->
            <ul class="sidebar navbar-nav">
              <li class="nav-item active">

                <router-link :to="{ name: 'home' }" class="nav-link">
                   
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                  
                </router-link> 
                
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-fw fa-user"></i>
                  <span>User</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">

                 <router-link :to="{ name: 'allusers' }">
                      <a class="dropdown-item">All Users</a>
                 </router-link>  

                 <router-link :to="{ name: 'adduser' }">
                    <a class="dropdown-item">Add User</a>
                 </router-link>  

                
                  
                </div>
              </li>
           
            </ul>

           
        
     

    <div id="content-wrapper">
   
            @yield('content')
     
<!-- Sticky Footer -->
<footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Yundo Exam 2019</span>
          </div>
        </div>
</footer>

</div>
    <!-- /.content-wrapper -->

</div>
