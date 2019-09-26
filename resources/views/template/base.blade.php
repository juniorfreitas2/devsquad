<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/font-awesome.css') }}">
    {{--    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/dist/sweetalert2.min.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">

    @yield('css')
</head>
<body class="">
<div id="app">
    @include('template.header')

    <div class="container">

        <div class="row">
            @include('template.sidebar')

            <div class="col-lg-9">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="{{ asset('plugins/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    {{--<script src="{{ asset('plugins/sweetalert2/dist/sweetalert2.min.js') }}"></script>--}}
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    <script type="text/javascript">
        @if(session('message'))
        toastr.success("{{session('message')}}", 'Sucesso!')
        @endif

        @if($errors->has('error'))
        toastr.warning("{{$errors->first('error')}}", 'Erro!')
        @endif

        @if($errors->has('exception'))
        toastr.error("{{$errors->first('exception')}}", 'Erro!')
        @endif
    </script>
@yield('js')
</body>
</html>