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
                    <div class="panel-footer">
                        <div class="text-right">
                            <button type="button" v-if="!invalid" v-on:click="submit" class="btn btn-w-md btn-success"> Salvar</button>
                        </div>
                    </div>
                </validation-observer>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script>
        const app = new Vue({
            el: '#app',
            data: {
                product:{
                    pro_nome: "",
                    pro_cat_id: "",
                    pro_valor: "",
                    pro_descricao: "",
                    pro_imagem: ""
                },
                money: {
                    decimal: ',',
                    thousands: '.',
                    prefix: 'R$ ',
                    precision: 2,
                    masked: false
                }

            },
            methods:{
                 submit() {
                    const isValid = this.$refs.observer.validate();
                    if (!isValid) {
                        return;
                    }
                     let currentLocation = '{{url('/produtos')}}';

                     axios.post(currentLocation, this.product)
                         .then(function(response){
                             toastr.success(response.message, 'Sucesso');
                             window.location.replace(currentLocation)
                         })
                         .catch(function (error) {
                         console.log(error);
                         toastr.error(error.message, 'Erro');
                     });

                }
            }
        });
    </script>
@stop
