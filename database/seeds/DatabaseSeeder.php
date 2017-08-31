<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder{//Classe responsável por popular o banco de dados
    /**
     * Run the database seeds.
     * @return void
     */
    public function run(){
        $this->call('pessoaTabelaSeeder');
    }
}

class pessoaTabelaSeeder extends Seeder{
    public function run(){
        DB::insert("INSERT INTO pessoas"
                . "(nome, email, telefone, estado_cidade)"
                . " VALUES(?, ?, ?, ?)", 
                array("Michael Nando", 
                    "michael425@hotmail.com",
                    "55(83)95464-2452",
                    25));
        DB::insert("INSERT INTO pessoas"
                . "(nome, email, telefone, estado_cidade)"
                . " VALUES(?, ?, ?, ?)", 
                array("Aline Souza", 
                    "alinesouza@hotmail.com.br",
                    "55(91)94258-2145",
                    20));
        DB::insert("INSERT INTO pessoas"
                . "(nome, email, telefone, estado_cidade)"
                . " VALUES(?, ?, ?, ?)", 
                array("Claudia Mendonça", 
                    "deboraalane425@gmail.com",
                    "55(96)94458-6545",
                    15));
    }
}
