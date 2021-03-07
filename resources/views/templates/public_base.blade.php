<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>@yield('title', Config::get('app.name'))</title>
    <meta charset="UTF-8">
    <meta name="description" content="Real estate HTML Template">
    <meta name="keywords" content="real estate, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Favicon -->
    <link href="{{asset('images/favicon.png')}}" rel="shortcut icon"/>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i,900%7cRoboto:400,400i,500,500i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">


 
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/slicknav.min.css')}}"/>
<script src="https://use.fontawesome.com/2c12051723.js"></script>

    <!-- Main Stylesheets -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}"/>
    @yield('additional-css')

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <header class="header-section">
        <a href="/" class="site-logo">
            FACT CHECK
        </a>
        <nav class="header-nav">
            <ul class="main-menu">
                <li><a href="{{URL::route('landing')}}" class="{{(Route::currentRouteName()=='landing'?'active':'')}}">Home</a></li>
            </ul>
        </nav>
    </header>

    @yield('content')
    <footer class="footer-section">
        <div class="container">
            <div class="copyright">Copyright &copy;
                <script>document.write(new Date().getFullYear());</script> 
                All rights reserved by <a href="" target="_blank">IncubateLabs</a>
            </div>
        </div>
    </footer>
    <!-- Footer Section end -->
    
    <!--====== Javascripts & Jquery ======-->
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.slicknav.min.js')}}"></script>
    <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    @yield('additional-scripts')
    </body>
</html>
