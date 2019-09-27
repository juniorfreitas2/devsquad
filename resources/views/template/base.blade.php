<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900' rel='stylesheet' type='text/css'>

    <!-- Page title -->
    <title>DevSquad | Desafio</title>

    <!-- Vendor styles -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome/css/font-awesome.css')}}"/>
    <link rel="stylesheet" href="{{asset('plugins/animate.css/animate.css')}}"/>
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.css')}}"/>
    <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}"/>

    <!-- App styles -->
    <link rel="stylesheet" href="{{asset('css/styles/pe-icons/pe-icon-7-stroke.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/styles/pe-icons/helper.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/styles/stroke-icons/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/styles/style.css')}}">
    <style>
        button, [type="button"], [type="reset"], [type="submit"] {
            -webkit-appearance: none;
        }
        .content > div {
            opacity: unset;
        }
    </style>
    @yield('css')
</head>
<body>

<div class="wrapper">

@include('template.header')

@include('template.sidebar')

<!-- Main content-->
    <section class="content">
        <div class="container-fluid">
            @yield("content")
        </div>
    </section>
    <!-- End main content-->

</div>

<!-- Vendor scripts -->
<script src="{{asset('plugins/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
<!-- App scripts -->
<script>
    var message = '{{ Session::has('message')}}'
    if(message) {
        toastr.success('{{ Session::get('message')}}', "Sucesso");
    }
    var error = '{{ Session::has('error')}}'
    if(error) {
        toastr.danger('{{ Session::get('error')}}', "Ooops!");
    }
</script>
@yield('js')
</body>

</html>