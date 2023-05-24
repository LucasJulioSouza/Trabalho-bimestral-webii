<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
     return view('eixos.index')->with('titulo', "");
})->name('index');

Route::resource('eixos', 'EixosController');
Route::resource('cursos', 'CursoController');
Route::resource('professores', 'ProfessorController');
Route::resource('disciplinas', 'DisciplinaController');