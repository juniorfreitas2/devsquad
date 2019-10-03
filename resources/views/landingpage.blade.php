<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atom Funding</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        /* Overrinding */
        @media (min-width: 1200px) {
            .container {
                max-width: 1640px;
            }
        }

        .navbar {
            padding: 11px;
            background: #FFFFFF 0% 0% no-repeat padding-box;
            opacity: 1;
        }

        .jumbotron {
            background: url(/images/component.png);
            height: calc(100vh - 95px);
            background-repeat: no-repeat;
            border-radius: 0;
        }
        .labelHeader{
            text-align: left;
            font: Bold 85px/80px Montserrat;
            letter-spacing: 1.27px;
            color: #FFFFFF;
            opacity: 1;
        }

        .title{
            top: 242px;
            left: 140px;
            width: 745px;
            height: 263px;
        }
        .subtitle {
            text-align: left;
            font: Regular 26px/35px Montserrat;
            letter-spacing: 0.39px;
            color: #FFFFFF;
            opacity: 1;
        }
        .header-banner {
            top: 975px;
            left: 0px;
            width: 1920px;
            height: 192px;
            background: #F7F7F7 0% 0% no-repeat padding-box;
            opacity: 1;
        }
    </style>
</head>
<body>
<nav class="navbar">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{asset('/images/logo.png')}}" alt="">
        </a>
    </div>
</nav>

<div class="jumbotron">
    <div class="container">
        <div class="title" >
            <div class="labelHeader">
                <p>Fast and simple,</p>
                <p>Unsecured </p>
                <p>funding.</p>
            </div>
        </div>
        <div class="subtitle">
            <p>Lorem ipsum dolor sit amet,</p>
            <p>consectetur adipiscing elit, sed do</p>
            <p>eiusmod tempor incididunt ut labore et dolore.</p>
        </div>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p>
        <div class="header-banner">
            <div class="row">

                <div class="col-md-6" style="text-align: center;
font: Bold 35px/50px Montserrat;
letter-spacing: 0;
opacity: 1;">
                    <p>Getting capital for your </p>
                    <p>business is complicated</p>
                </div>

                <div class="col-md-6">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>