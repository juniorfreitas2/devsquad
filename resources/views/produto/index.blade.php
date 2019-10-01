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
    <div class="col-lg-12">
        <div class="panel panel-filled">
            <div class="panel-body">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search by Name.." aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <select class="form-control" name="account" style="width: 100%">
                            <option selected="">Select department</option>
                            <option>Option 1</option>
                            <option>Option 2</option>
                        </select>
                    </div>
                </div>
            </div>
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