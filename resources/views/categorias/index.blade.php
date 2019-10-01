@extends('template.base')

@section("content")
    <div class="row">
        <div class="col-lg-12">
            <div class="view-header">
                <div class="header-icon">
                    <i class="fa fa-cube"></i>
                </div>
                <div class="header-title">
                    <h3 class="m-b-xs">Categorias</h3>
                    <small>Lista de categorias</small>
                </div>
            </div>
            <hr>
        </div>
    </div>

    <div class="panel" id="app">
        <div class="panel-body">
            <data-grid
                url="{{url('api/categorias')}}"
                primary-key="cat_id"
                :custom-fields="{cat_nome: 'Categoria'}"
                :user-filters="{ cat_nome: {type: 'text', size: 6} }"
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