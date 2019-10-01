
<div class="row">
    <div class="form-group col-md-7" >
        {!! Form::label('pro_nome', 'Nome*', ['class' => 'control-label']) !!}
        <div class="controls">
            <validation-provider rules="required" v-slot="{ errors }">
                <input class="form-control" v-model="product.pro_nome"  type="text">
                <ul><li v-for="error in errors"><p class="text-danger">@{{ error }}</p></li></ul>
            </validation-provider>
        </div>
    </div>

    <div class="form-group col-md-3">
        {!! Form::label('pro_cat_id', 'Categoria*', ['class' => 'control-label']) !!}
        <div class="controls">
            <validation-provider rules="required" v-slot="{ errors }">
                {!! Form::select('pro_cat_id',$categorias,old('pro_cat_id'), ['class' => 'form-control', 'placeholder'=>'Selecione','v-model'=>'product.pro_cat_id']) !!}
                <ul><li v-for="error in errors"><p class="text-danger">@{{ error }}</p></li></ul>
            </validation-provider>
        </div>

    </div>

    <div class="form-group col-md-2">
        {!! Form::label('pro_valor', 'Valor*', ['class' => 'control-label']) !!}
        <div class="controls">
            <validation-provider rules="required" v-slot="{ errors }">
                <money class="form-control" v-model="product.pro_valor" v-bind="money"></money>
                <ul><li v-for="error in errors"><p class="text-danger">@{{ error }}</p></li></ul>
            </validation-provider>
        </div>
    </div>

    <div class="form-group col-md-12">
        {!! Form::label('pro_descricao', 'Descrição*', ['class' => 'control-label']) !!}
        <div class="controls">
            <validation-provider rules="required" v-slot="{ errors }">
                <input class="form-control" v-model="product.pro_descricao" type="text">
                <ul><li v-for="error in errors"><p class="text-danger">@{{ error }}</p></li></ul>
            </validation-provider>
        </div>
    </div>
</div>

<div class="col-md-12">
    {!! Form::label('pro_imagem', 'Adicione uma imagem', ['class' => 'control-label']) !!}
    <div class=" form-group ">
        <div class="form-group">
            <input name="pro_imagem" type="file" class="form-control-file" id="exampleFormControlFile1">
        </div>
    </div>
</div>
<div class="panel-footer">
    <div class="text-right">
        <div v-if="edit">
            <button type="button" v-if="!invalid" v-on:click="update" class="btn btn-w-md btn-success"> Editar</button>
        </div>
        <div v-else>
            <button type="button" v-if="!invalid" v-on:click="submit" class="btn btn-w-md btn-success"> Salvar</button>
        </div>
    </div>
</div>
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
                },
                edit:false,
                currentLocation: '{{url('/produtos')}}'

            },
            methods:{
                submit() {
                    const isValid = this.$refs.observer.validate();

                    if (!isValid) {
                        return;
                    }

                    axios.post(this.currentLocation, this.product)
                        .catch( () => { toastr.error("Erro ao salvar", 'Erro');
                    });
                },
                update () {
                    const isValid = this.$refs.observer.validate();

                    if (!isValid) {
                        return;
                    }

                    let url = this.currentLocation+'/'+this.product.pro_id;

                    axios.put(url, this.product)
                        .then( () => { toastr.success("Salvo com sucesso", 'Sucesso') })
                        .catch( () => { toastr.error("Erro ao salvar", 'Erro') });
                }
            },
            created () {
                let produto = '{!!$produto!!}'

                if(produto) {
                    this.edit = true;
                    this.product = JSON.parse(produto);
                }

            }
        });
    </script>
@stop
