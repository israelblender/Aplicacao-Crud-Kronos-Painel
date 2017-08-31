@extends('layouts.template')
@section('conteudo')

<br><br>
<div class="alert alert-success">
  <strong>Concluído!</strong> {{$mensagem}}
</div>
<div class="row">
    <hr/>
    <div id="actions" class="row">
        <div class="col-md-12">
            <a href="/exibir" class="btn btn-default"><< Voltar</a>
        </div>
    </div>
</div>
@stop
