@extends('template.base')

@section("content")
    <div class="container" style="margin-top: 87px">
        <div class="col-lg-12">
            <div class="text-right">
                <a href="{{url('/produtos/create')}}" class="btn btn-w-md btn-primary">Novo</a>
            </div>
            <hr>
        </div>
    </div>

    <div class="panel">
        <div class="panel-body">
            <data-grid></data-grid>
        </div>
    </div>
@stop