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
    <validation-observer ref="observer" tag="form" v-slot="{ invalid }">
        @include('produto.includes.form')
    </validation-observer>
@stop