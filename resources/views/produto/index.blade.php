@extends('template.base')

@section("content")
    <div class="row">
        <div class="col-lg-12">
            <div class="view-header">
                <div class="header-icon">
                    <i class="fa fa-cube"></i>
                </div>
                <div class="header-title">
                    <h3 class="m-b-xs">Produtos</h3>
                    <small>Lista de Produtos</small>
                </div>
                <div class="text-right">
                    <a href="{{url('/produtos/create')}}" class="btn btn-w-md btn-primary">Novo</a>
                </div>
            </div>
            <hr>
        </div>
    </div>

    <div class="panel" id="app">
        <div class="panel-body">
            <data-grid
                url="{{url('/all')}}"
                primary-key="pro_id"
                :custom-fields="{pro_nome: 'Produto', pro_valor: 'Preço', pro_cat_id: 'Categoria'}"
            ></data-grid>
        </div>
    </div>
@stop
@section('js')
    <script>
        const app = new Vue({
            el: '#app'
        });
    </script>
@stop