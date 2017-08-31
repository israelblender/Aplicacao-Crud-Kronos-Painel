@extends('layouts.template')
@section('conteudo')
<!--<div id="main" class="container">-->
    <h3 class="page-header">Cadastrar Pessoa</h3>
    <form action="/salvardados" method="POST">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <div class="row">
            <div class="form-group col-md-3">
                <label for="campo1">Nome *</label>
                <input type="text" class="form-control" name="nome" id="nome" required>
            </div>
            <div class="form-group col-md-3">
                <label for="campo2">Email *</label>
                <input type="text" class="form-control" name="email" id="email" required >
                
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-2">
                <label for="campo1">Telefone</label>
                <input type="text" class="form-control" name="telefone" id="telefone">
            </div>

            <div class="form-group col-md-2">
                <label for="campo2">Estado *</label>
                <select class="form-control" name="estado" id="estado" onclick="getCitiesByState()" required>

                    @foreach($estados as $estado)
                    <option value="{{$estado['id']}}">{{$estado['nome']}}</option>
                    @endforeach
                    <option value="" selected disabled>Estado</option>
                </select>
            </div>

            <div class="form-group col-md-2">
                <label for="campo2">Cidade *</label>
                <div id="opcoes">
                    <select class="form-control"required><option value="" selected disabled>Selecione o Estado</option></select>
                </div>
            </div>
        </div>
        <hr/>
        <div id="actions" class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-success" id='botao_salvar'>Salvar</button>
                <a href="/" class="btn btn-default">Cancelar</a>
            </div>
        </div>
    </form>
    <!--</div>-->
@stop
@section('javascript')
<script>
    function getCitiesByState(){
        var id_estado = $("#estado").val();
        $.get("http://localhost:8000/cidades/"+id_estado, function(string_json){
            var html = "<select class='form-control'  name='cidade' id='cidade' required>"
            //$.getJSON(string_json);
            $.each(string_json, 
                function (i, item){
                    html += "<option value="+item.id+">"+item.cidade+"</option>";
                }
            );
            //alert(string_json[0]["nome"]);
            html += "</select>";
            $("#opcoes").html(html);
        });
    };
    
</script>
@stop