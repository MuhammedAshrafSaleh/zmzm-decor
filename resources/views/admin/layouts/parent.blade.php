<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ url('imgs/favicon.ico') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600;700;800;900;1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('dist/css/style.css') }}" />
    <link rel="stylesheet" href="{{ url('dist/css/sweetalert2.min.css') }}">
    @yield('css')
</head>

<body>

    <div class="wrapper">
        <!--==========================================================================-
        pre-loader
    --==========================================================================-->
        <div id="pre-loader">
            <img src="{{ url('dist/images/pre-loader/loader-01.svg') }}" alt="">
        </div>


        <!--==========================================================================-
        Navbar
    --==========================================================================-->
        @include('admin.includes.nav')


                <!--==========================================================================-
            Content
        --==========================================================================-->
        <div class="container-fluid">
            <div class="row">
                <!--==========================================================================-
            Sidebar Navbar
        --==========================================================================-->
                @include('admin.includes.sidebar')

                <div class="content-wrapper">
                    <div class="page-title" style="margin-top: 2rem;">
                        <div class="row">
                            <div class="col-sm-6">
                                <h1 class="m-0 mb-4">@yield('title')</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active">@yield('title')</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>



    @yield('pre-js')
    <script src="{{ url('dist/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ url('dist/js/plugins-jquery.js') }}"></script>
    <script src="{{ url('dist/js/sweetalert2.all.min.js') }}"></script>
    <script>
        var plugin_path = 'js/';
    </script>
    <script src="{{ url('dist/js/custom.js') }}"></script>
    <script>
    preloader = function () {
       $("#load").fadeOut();
       $('#pre-loader').delay(0).fadeOut('slow');
   };
   $(window).on("load",function(){
          preloader();
    });
    </script>
    @yield('js')
</body>

</html>
