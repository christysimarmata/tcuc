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
        <img src="{{ URL::to('/') }}/images/logo-image.png" class="image-logo">
        <div class="cognitium">
        <a href="" style="color: white;"><i class="fa fa fa-external-link"></i> LMS Cognitium</a>
        </div>
    </div>

    <div class="align-content-center" style="margin-top: -40px;">
        <div class="container">
            <div class="login-content">
                <div class="login-logo" >
                    
                        <img src="{{ URL::to('/') }}/images/logo-image.png" alt="" class="image-logo2">
                        <center><h1>Telkom Certification</h1></center>
                </div>
                <div id="login-form">
                    <form method="post" action="login_action">
                        <div class="group" id="user-input">
                            
                            <input type="text" name="nik" placeholder="NIK" required="">
                           
                        </div>
                        <div class="group" id="pass-input">
                            <input type="password" name="password" placeholder="Password" required="">
                  
                        </div>
                        
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-login">
            <div class="col-lg-4 location">
                <h1 class="title">Location</h1>
                <h5><i class="fa fa-map-marker"></i> {{ $address }} </h5>
            </div>
            <div class="col-lg-4 contact">
                <h1 class="title">Contact</h1>
                <h5><i class="fa fa-phone"></i> {{ $phone_number }} </h5>
                <h5><i class="fa fa-envelope"></i> {{ $email }} </h5>
            </div>
        </div>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
