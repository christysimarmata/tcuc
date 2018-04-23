<!DOCTYPE html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Telkom Corpu</title>
    <meta name="description" content="Telkom Corpu">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cs-skin-elastic.css') }}">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{ asset('scss/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/lib/vector-map/jqvmap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>


</head>
<body>
    <div class="bar-header"">
        <img src="{{ URL::to('/') }}/images/logotelkom4.png" class="image-logo">
        
        <a href="https://corpu.telkom.co.id" style="color: white;" id="cognitium"><i class="fa fa fa-external-link" ></i> Cognitium LMS</a>
  
    </div>

    <div class="align-content-center" style="margin-top: -40px;">
        <div class="container">
            <div class="login-content">
                <div class="login-logo" >
                        <img src="{{ URL::to('/') }}/images/logocertification.png" alt="" class="image-logo2">
                </div>
                <div id="login-form">
                    <form method="post" action="login_action">
                        <!-- <div class="group" id="user-input">
                            
                            <input type="text" name="nik" placeholder="NIK" required="">
                           
                        </div>
                        <div class="group" id="pass-input">
                            <input type="password" name="password" placeholder="Password" required="">                
                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button> -->
                        <div class="wrap-input100 validate-input m-t-85 m-b-35">
                            <input class="input100" type="text" name="nik" placeholder="NIK" required="">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100 validate-input m-b-50">
                            <input class="input100" type="password" name="password" placeholder="Password" required="">
                            <span class="focus-input100"></span>
                        </div>

                        <center><div class="container-login100-form-btn">
                            <button type="submit" class="login100-form-btn">
                                Login
                            </button>
                        </div></center>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>

        <div class="footer-login col-lg-12">
            <div class="col-lg-1"></div>
            <div class="col-lg-3 location">
                <h2 class="title">Location</h2>
                <h5><i class="fa fa-map-marker inborder"></i> {{ $address }} </h5>
            </div>
            <div class="col-lg-4 contact">
                <h2 class="title">Contact</h2>
                <h5><i class="fa fa-phone inborder"></i> {{ $phone_number }} </h5>
                <h5><i class="fa fa-envelope inborder"></i> {{ $email }} </h5>
            </div>
            <div class="col-lg-3 logolagi">
                <img src="{{ URL::to('/') }}/images/logotcuc.png" class="image-logo3">
            </div>
            <div class="col-lg-1"></div>
        </div>

    <div class="bar-footer"">
        <i class="fa fa-copyright"></i> Copyright 2018.PT.Telekomunikasi Indonesia, Tbk.
  
    </div>

    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
