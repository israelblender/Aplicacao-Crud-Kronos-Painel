<?php
Route::get('/', function () {
    return view('inicio_kronos');
});

Route::get('/exibir/{id?}/', 'pessoaController@show')->name('exibirCadastro');
Route::get('/cadastrar', 'pessoaController@create')->name('novoCadastro');
Route::get('/editar/{id}', 'pessoaController@edit')->name('editarCadastro');
Route::get('/excluir/{id}', 'pessoaController@destroy')->name('excluirCadastro');
Route::get('/cidades/{id_estado}', 'pessoaController@getCitiesByState')->name('exibirCidades');

Route::post('/salvardados', 'pessoaController@store')->name('salvarCadastro');
Route::post('/atualizardados/{id}', 'pessoaController@update')->name('atualizarCadastro');
