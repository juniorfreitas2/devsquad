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
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal">
                        Importar
                    </button>
                </div>
            </div>
            <hr>
        </div>
    </div>

    <div class="panel" id="app">

        <div class="panel-body">
            <data-grid
                url="{{url('api/produtos')}}"
                primary-key="pro_id"
                :custom-fields="{pro_nome: 'Produto', pro_valor: 'Preço', pro_cat_id: 'Categoria'}"
                action-buttons=false
                :user-filters="{ pro_nome: {type: 'text', size: 6} }"
            ></data-grid>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Selecione o arquivo para importar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input name="modal" v-on:change="onImageImport" type="file" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" v-on:click="submit">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        const app = new Vue({
            el: '#app',
            data:{
              file:''
            },
            methods:{
                onImageImport(e) {
                    console.log(e.target.files[0]);
                    this.file = e.target.files[0];
                },
                submit() {
                    if (!this.file) {
                        return;
                    }

                    var formData = new FormData();
                    let header = { headers: { 'content-type': 'multipart/form-data' } };

                    formData.append('file', this.file)

                    axios.post('{{url('/api/import')}}', formData, header)
                        .then( () => {
                            $('#modal').modal('hide');
                            toastr.success("Salvo com sucesso", 'Sucesso')
                        })
                        .catch( () => { toastr.error("Erro ao importar produtos", 'Erro');
                        });
                },
            }
        });
    </script>
@stop