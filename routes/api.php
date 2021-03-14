<?php

use Illuminate\Http\Request;
use App\Empregado;

// listar empregados
Route::get('empregados', function(){
	$empregados = Empregado::get();
	return $empregados;
});

// rota para guardar
Route::post('empregados', function(Request $request){
	
	$request->validate([
		'nome'=>'required|max:50',
		'apelido'=>'required|max:50',
		'bilhete'=>'required|max:20',
		'email'=>'required|max:50|email|unique:empregados',
		'local_nascimento'=>'required|max:50',
		'sexo'=>'required|max:50',
		'estado_civil'=>'required|max:50',
		'telefone'=>'required|numeric'
	]);

	$empregados = new Empregado;
	$empregados->nome = $request->input('nome');
	$empregados->apelido = $request->input('apelido');
	$empregados->bilhete = $request->input('bilhete');
	$empregados->email = $request->input('email');
	$empregados->local_nascimento = $request->input('local_nascimento');
	$empregados->sexo = $request->input('sexo');
	$empregados->estado_civil = $request->input('estado_civil');
	$empregados->telefone = $request->input('telefone');
	$empregados->save();

	return "Empregado criado com sucesso!";
});

//actualizar 
Route::put('empregados/{id}', function(Request $request, $id){
	
		$request->validate([
		'nome'=>'required|max:50',
		'apelido'=>'required|max:50',
		'bilhete'=>'required|max:20',
		'email'=>'required|max:50|email|unique:empregados',
		'local_nascimento'=>'required|max:50',
		'sexo'=>'required|max:50',
		'estado_civil'=>'required|max:50',
		'telefone'=>'required|numeric'
	]);

	$empregados = Empregado::findOrFail($id);

	$empregados->nome = $request->input('nome');
	$empregados->apelido = $request->input('apelido');
	$empregados->bilhete = $request->input('bilhete');
	$empregados->email = $request->input('email');
	$empregados->local_nascimento = $request->input('local_nascimento');
	$empregados->sexo = $request->input('sexo');
	$empregados->estado_civil = $request->input('estado_civil');
	$empregados->telefone = $request->input('telefone');
	$empregados->save();
	return "Empregado actualizado com sucesso!";
});

//apagar
Route::delete('empregados/{id}', function($id){
	$empregados = Empregado::findOrFail($id);

	$empregados->delete();
	return "Empregado apago correctamente.";

});

// selecionar um dado apenas por id
Route::get('empregados/{id}', function($id){
	$empregados = Empregado::findOrFail($id);

	return $empregados;
	// $empregados->delete();
	// return "Empregado apago correctamente.";

});