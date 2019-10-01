
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
        @if($errors->has('pro_imagem'))
            <span class="help-block">{{ $errors->first('pro_imagem') }}</span>
        @endif
    </div>
</div>
