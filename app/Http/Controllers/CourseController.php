<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    //listar os cursos
    public function index(){
        //carrega a view
        return view ('courses.index');
    }

    
    //visualizar os cursos
    public function show(){
        //carrega a view
        return view ('courses.show');
    }

    
    //carregar o formulario Criar os cursos
    public function create(){
        //carrega a view
        return view ('courses.create');
    }

    
    //cadastrar no banco de dados o novo cuurso
    public function store(){
        dd("Cadastrar");
    }

    
    //Carregar o forms editar curso
    public function edit(){
        //carrega a view
        return view ('courses.edit');
    }

    
    //Editar o curso no banco de dados
    public function update(){

        dd("Editar");
    }

    
    //Excluir o curso do banco de dados
    public function destroy(){
        dd("Ecluir");
    }
}
