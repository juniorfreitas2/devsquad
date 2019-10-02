<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Jumbotron Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/jumbotron/">

    <!-- Bootstrap core CSS -->
{{--    <link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">--}}
    <link rel="stylesheet" href="{{asset('plugins/fontawesome/css/font-awesome.css')}}"/>
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.css')}}"/>

    <!-- Custom styles for this template -->
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
        body{
            top: 0px;
            left: 0px;
            width: 1920px;
            height: 975px;
            opacity: 1;
        }
        .imageHeader{
            background-image: url("/images/component.png");

        }
        .display-1{
            padding-top: 100px;
            text-align: left;
            top: 242px;
            left: 140px;
            width: 745px;
            /*height: 263px;*/
            text-align: left;
            font: Bold 85px/80px Montserrat !important;
            letter-spacing: 1.27px;
            color: #FFFFFF;
            opacity: 1;
        }
        .header-subtitle{
            top: 515px;
            left: 140px;
            width: 536px;
            height: 140px;
            text-align: left;
            font: Regular 26px/35px Montserrat;
            letter-spacing: 0.39px;
            color: #FFFFFF;
            opacity: 1;
        }
        .navbar-custom{
            top: 0px;
            left: 0px;
            width: 1920px;
            height: 85px;
            background: #FFFFFF 0% 0% no-repeat padding-box;
            opacity: 1;
        }
        .logo{
            padding-left: 100px;
        }
        .button-radius{
            background: #28AD47 0% 0% no-repeat padding-box;
            border-radius: 37px;
            opacity: 1;
            top: 691px;
            left: 233px;
            width: 161px;
            height: 29px;
            text-align: center;
            font: ExtraBold 24px/80px Montserrat;
            letter-spacing: 0.36px;
            color: #FFFFFF;
            opacity: 1;
        }
    </style>
    {{--    <link href="jumbotron.css" rel="stylesheet">--}}
</head>
<body>
<nav class="navbar navbar-expand-md navbar-custom">

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <div class="logo">
            <image src="{{asset('/images/logo.png')}}"></image>
        </div>
    </div>
</nav>

<main role="main">

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="imageHeader">
        <div class="content" style="padding: 80px">
            <div class="display-1">
                <p>
                    Fast and simple,
                </p>
                <p>
                    Unsecured
                </p>
                <p>
                    funding.
                </p>
            </div>
            <div class="header-subtitle">
                <p class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                <div class="" style="">
                    <button class="btn button-radius"  role="button">APPLY NOW</button>
                    Applying doesn’t affect your credit score, and there’s no obligation to accept funding.
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            <div class="col-md-4">
                <h2>Heading</h2>
                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
            </div>
            <div class="col-md-4">
                <h2>Heading</h2>
                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
            </div>
            <div class="col-md-4">
                <h2>Heading</h2>
                <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
            </div>
        </div>

        <hr>

    </div> <!-- /container -->

</main>

<footer class="container">
    <p>&copy; Company 2017-2019</p>
</footer>
{{--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>--}}
{{--<script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script></body>--}}
</html>
