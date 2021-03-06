<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Telkom Corpu</title>
    <meta name="description" content="Telkom Corpu">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
        <link rel="stylesheet" href="{{ asset('css/date_picker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('scss/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <style type="text/css">
        .hilang {
            display: none;
        }

        .logo-kanan-atas {
            float: right;
            width: 18%;
        }
    </style>

</head>
<body>


        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="{{ asset('images/logosidebar.png') }}" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="{{ asset('images/logotelkom2.png') }}" alt="Logo"></a>
                <div class="logo-samping">
                <a href="../profile">
                    <img class="avatar-sidebar" src="{{ URL::to('/') }}/images/uploads/{{ session('avatarUserAktif') }}" alt="User Avatar" style="width: 60%;">
                </a>
                <center><p style="color: white; font-size: 18px; font-weight: 700; margin-top: 5px;">{{ session('nama') }}</p></center>
                <center><p style="color: white; font-size: 14px; font-style: italic; margin-top: -15px;">{{ session('email') }}</p></center>
                </div>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="../../dashboard"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Academy</a>
                        <ul class="sub-menu children dropdown-menu">
                            @foreach(session('listacademy') as $academy)
                                <li><i class="fa fa-puzzle-piece"></i><a href="../academy/{{ $academy }}">{{ $academy }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li>
                        <a href="../../profile"> <i class="menu-icon fa fa-table"></i>Profile</a>
                    </li>
                    <li>
                        <a href="../../mycertification"> <i class="menu-icon fa fa-th"></i>My Certification</a>
                    </li>
                    <li>
                        <a href="../../reports"> <i class="menu-icon fa fa-file"></i>Reports</a>
                    </li>
                    <li>
                        <a href="../../help"> <i class="menu-icon fa fa-question"></i>Help</a>
                    </li>
                    <li>
                        <a href="../../logout"> <i class="menu-icon fa fa-sign-out"></i>Logout </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    
                </div>

                <div class="col-sm-5">
                    <div>
                        <a href="../dashboard">
                            <img class="logo-kanan-atas" src="{{ URL::to('/') }}/images/logocertification2.png" alt="User Avatar">
                        </a>              
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        @stack('styles')
        @yield('content')
        @stack('scripts')
        

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="{{ asset('js/vendor/jquery-2.1.4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/date_picker.js') }}"></script>
    <script src="{{ asset('js/chartjs.min.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/widgets.js') }}"></script>

</body>
</html>
