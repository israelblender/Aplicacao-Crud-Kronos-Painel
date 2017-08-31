<?php
namespace App\Http\Controllers;
use Request;
use DB;
use Storage;

class pessoaController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->estados = ["AC", "AL", "AM", "AP", "BA", "CE", "DF", "ES", "GO", "MA", "MG", "MS", "MT", "PA", "PB", "PE", "PI", "PR", "RJ", "RN", "RO", "RR", "RS", "SC", "SE", "SP", "TO"];
        $this->json_estados = Storage::get('estados.json');
    }
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
       
    public function create(){
        return view("novo_cadastro", ['estados'=>json_decode($this->json_estados, true)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(){//Request $request
        //return $request::input("nome");
        $nome = Request::input("nome");
        $email = Request::input("email");
        $telefone = Request::input("telefone", "");
        $estado_cidade = Request::input("cidade");
        DB::select("insert into pessoas (nome, email, telefone, estado_cidade) "
                . "values(?, ?, ?, ?)", 
        [$nome, $email, $telefone, $estado_cidade]);
        return view("layouts.mensagem", ["mensagem"=>"Seus dados foram salvos com sucesso."]);
    }
    public function edit($id){
        $informacoes = DB::select(""
        . "SELECT pessoas.id, pessoas.nome, email, telefone, cidades.id as id_cidade, cidades.nome as cidade, (SELECT id FROM estados "
        . "WHERE id=cidades.estado) as id_estado"
        . " FROM pessoas INNER JOIN cidades WHERE pessoas.estado_cidade = cidades.id AND pessoas.id = ?", [$id]);
        if (empty($informacoes)){
                return "Nenhuma informação referente ao ID informado.";
            }
        
        return view("editar_cadastro", ['cadastro'=>$informacoes[0], 'estados'=>json_decode($this->json_estados, true)]);
    }

    public function show($id=false){
        if ($id){
            $informacoes = DB::select(""
            . "SELECT pessoas.id, pessoas.nome, email, telefone, cidades.nome as cidade, (SELECT nome FROM estados "
            . "WHERE id=cidades.estado) as estado "
            . "FROM pessoas INNER JOIN cidades WHERE pessoas.estado_cidade = cidades.id AND pessoas.id = ?", [$id]);
            if (empty($informacoes)){
                return "Nenhuma informação referente ao ID informado.";
            }
            
            return view('exibir_cadastro', ['viewAll'=>false, 'cadastro'=>$informacoes[0]]);
        }
        else{
            $todosCadastros = DB::select("SELECT id, nome, email FROM pessoas");
            //dd($todosCadastros);
            return view('exibir_cadastro', ['viewAll'=>true, 'todosCadastros'=>$todosCadastros]);
        }
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $nome = Request::input("nome");
        
        $email = Request::input("email");
        $email_original = Request::input("email_original");
        
        $telefone = Request::input("telefone", "");
        $estado_cidade = Request::input("cidade");
        
        if($email == $email_original){
            DB::select("update pessoas set nome=?, telefone=?, estado_cidade=? where id=?", 
        [$nome, $telefone, $estado_cidade, $id]);
        }else{
            DB::select("update pessoas set nome=?, email=?, telefone=?, estado_cidade=? where id=?", 
        [$nome, $email, $telefone, $estado_cidade, $id]);
        }
        
        return view("layouts.mensagem", ["mensagem"=>"Seus dados foram atualizados com sucesso."]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        DB::select("delete from pessoas where id = ?", [$id]);
        return view("layouts.mensagem", ["mensagem"=>"Dados removidos com sucesso."]);
    }
    public function getCitiesByState($id_estado){
        
        //$json = Storage::disk('local')->get('cidades.json');
        $json = Storage::get('CidadesPorEstado/ESTADO_'.$this->estados[$id_estado-1].'.json');
        $json = json_decode($json, true);
        return $json;
    }         
}
