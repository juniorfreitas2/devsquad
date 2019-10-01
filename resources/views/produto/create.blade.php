@extends('template.base')

@section("content")
    <div class="row">
        <div class="col-lg-12">
            <div class="view-header">
                <div class="header-icon">
                    <i class="pe page-header-icon pe-7s-user"></i>
                </div>
                <div class="header-title">
                    <h3 class="m-b-xs">Cadastro de Produtos</h3>
                </div>
            </div>
            <hr>
        </div>
    </div>
    <div class="col-md-12">
        <div class="panel panel-filled panel-c-accent">
            <div class="panel-heading">
                <div class="panel-tools">
                    <a class="panel-toggle"><i class="fa fa-chevron-up"></i></a>
                    <a class="panel-close"><i class="fa fa-times"></i></a>
                </div>
                Formulário
            </div>
            <div class="panel-body" id="app">
                <validation-observer ref="observer" tag="form" v-slot="{ invalid }">
                    @include('produto.includes.form')
                </validation-observer>
            </div>
        </div>
    </div>
@stop
