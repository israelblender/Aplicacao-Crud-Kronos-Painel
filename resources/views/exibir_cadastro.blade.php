@extends('layouts.template')
@section('conteudo')   
    @if (!$viewAll)
        <h3 class="page-header">Informações pessoais </h3>

        <table class="table table-bordered" >
            <tr>
                <td>ID</td>
                <td>{{$cadastro->id}}</td>
            </tr>
            <tr>
                <td>Nome</td>
                <td>{{$cadastro->nome}}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{$cadastro->email}}</td>
            </tr>
            <tr>
                <td>Telefone</td>
                <td class="{{strlen($cadastro->telefone)>0? '': 'danger'}}">{{$cadastro->telefone}}</td>
            </tr>
            <tr>
                <td>Cidade</td>
                <td>{{$cadastro->cidade}}</td>
            </tr>
            <tr>
                <td>Estado</td>
                <td>{{$cadastro->estado}}</td>
            </tr>
        </table>

        <div class="row">
            <hr/>
            <div id="actions" class="row">
                <div class="col-md-12">
                    <a href="/editar/{{$cadastro->id}}" class="btn btn-primary">Editar</a>
                    <a href="/excluir/{{$cadastro->id}}" class="btn btn-danger">Excluir</a>
                    <a href="/exibir" class="btn btn-default"><< Voltar</a>
                </div>
            </div>
        </div>
        

    @else
        <h3 class="page-header">Cadastros </h3>
        
        @if(empty($todosCadastros))
            <div class="alert alert-danger">
                Nenhum Cadastro encontrado.
            </div>
        @else
            <table class="table table-bordered table-hover table-striped" >
                <tr>
                    <td id="nome"  scope="col" axis="expenses">Nome
                    <td id="email"  scope="col" axis="expenses">Email
                </tr>
            @foreach($todosCadastros as $cadastro)
                <tr>
                    <td>{{$cadastro->nome}}</td>
                    <td>{{$cadastro->email}}</td>
                    <td><a href="/exibir/{{$cadastro->id}}"><span class="glyphicon glyphicon-pencil" style=".glyphicon{font-size:25px;color:#FF6600}"></span></a></td>
                </tr>
            @endforeach
            </table>
        @endif
        <div class="row">
            <hr/>
            <div id="actions" class="row">
                <div class="col-md-12">
                    <a href="/cadastrar" class="btn btn-primary">Novo Cadastro</a>
                    <a href="/" class="btn btn-default"><< Inicio</a>
                </div>
            </div>
        </div>
    @endif
@stop