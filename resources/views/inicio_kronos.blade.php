
            @extends('layouts.template')
            @section('conteudo')
            <h1 style="font-size:30px;color:#FF6600">KronosPainel</h1>
            <h4>Bem-vindo a aplicação KronosPainel!</h4>
            <p>
                Com esta ferramenta é possível realizar tarefas de cadastro, leitura, altareção e exclusão
                de dados pessoais.
            </p>
            <br><br>
            
<!--            <input type="button" onclick="window.location='/cadastrar'" value="Novo Cadastro">
            <input type="button" onclick="window.location='/exibir'" value="Todos Cadastros">-->
            
            <a href="/exibir" class="btn btn-default">Acessar todos os cadastros</a>
            @stop