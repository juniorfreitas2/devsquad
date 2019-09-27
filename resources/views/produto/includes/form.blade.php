<div class="col-md-12">
    <div class="panel panel-filled panel-c-accent">
        <div class="panel-heading">
            <div class="panel-tools">
                <a class="panel-toggle"><i class="fa fa-chevron-up"></i></a>
                <a class="panel-close"><i class="fa fa-times"></i></a>
            </div>
            Formulário
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="form-group col-md-7 @if ($errors->has('pro_nome')) has-error @endif">
                    {!! Form::label('pro_nome', 'Nome*', ['class' => 'control-label']) !!}
                    <div class="controls">
                        {!! Form::text('pro_nome', old('pro_nome'), ['class' => 'form-control']) !!}
                        @if ($errors->has('pro_nome')) <p class="help-block">Campo Obrigatório</p> @endif
                    </div>
                </div>

                <div class="form-group col-md-3 @if ($errors->has('pro_cat_id')) has-error @endif">
                    {!! Form::label('pro_cat_id', 'Categoria*', ['class' => 'control-label']) !!}
                    <div class="controls">
                        {!! Form::select('pro_cat_id',$categorias,old('pro_cat_id'), ['class' => 'form-control', 'placeholder'=>'Selecione']) !!}
                        @if ($errors->has('pro_cat_id')) <p class="help-block">Campo Obrigatório</p> @endif
                    </div>

                </div>

                <div class="form-group col-md-2 @if ($errors->has('pro_valor')) has-error @endif">
                    {!! Form::label('pro_valor', 'Valor*', ['class' => 'control-label']) !!}
                    <div class="controls">
                        {!! Form::text('pro_valor', old('pro_valor'), ['class' => 'form-control', 'id'=>'pro_valor']) !!}
                        @if ($errors->has('pro_valor')) <p class="help-block">Campo Obrigatório</p> @endif
                    </div>
                </div>

                <div class="form-group col-md-12 @if ($errors->has('pro_descricao')) has-error @endif">
                    {!! Form::label('pro_descricao', 'Descrição*', ['class' => 'control-label']) !!}
                    <div class="controls">
                        {!! Form::textarea('pro_descricao', old('pro_descricao'), ['class' => 'form-control', 'rows'=>'3']) !!}
                        @if ($errors->has('pro_descricao')) <p class="help-block">Campo Obrigatório</p> @endif
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
        </div>

        <div class="panel-footer">
            <div class="text-right">
                <button type="submit" class="btn btn-w-md btn-success"> Salvar</button>
            </div>
        </div>
    </div>
</div>

@section('js')
    @parent
    <script src="{{ asset('js/maskmoney.js') }}"></script>
    <script>
        $(function () {
            $('#pro_valor').maskMoney({
                prefix: 'R$ ',
                decimal:",", 
                thousands:"."
            });
        });
    </script>
@stop