@extends('template.base')

@section("content")
    <div class="row">
        <div class="col-lg-12">
            <div class="view-header">
                <div class="header-icon">
                    <i class="fa fa-cube"></i>
                </div>
                <div class="header-title">
                    <h3 class="m-b-xs">Detalhes do produto</h3>
                    <small>{{$produto->categoria->cat_nome}}</small>
                </div>
            </div>
            <div class="body">

            </div>
            <hr>
        </div>
    </div>
    <div class="col-md-12">
        <div class="panel panel-filled">

            <div class="panel-body">

                <div class="row">
                    <table class="table table-responsive-sm">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Categoria</th>
                            <th>Preço</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">{{$produto->pro_id}}</th>
                            <td>{{$produto->pro_nome}}</td>
                            <td>{{$produto->pro_descricao}}</td>
                            <td>{{$produto->categoria->cat_nome}}</td>
                            <td>R$ {{$produto->pro_valor}}</td>
                        </tr>
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>

@stop