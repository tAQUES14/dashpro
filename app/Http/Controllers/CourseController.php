<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    
    // Listar os cursos
    public function index(){

        // Recuperar os registros do banco dados
        // $courses = Course::where('id', 1000)->get();
        // $courses = Course::paginate(10);
        $courses = Course::orderBy('name', 'ASC')->get();

        // Carregar a VIEW
        return view('courses.index', ['courses' => $courses]);
        
    }
    
    // Visualizar o curso
    public function show(Course $course){

        // dd($request->course);
        // $course = Course::where('id', $request->course)->first();

        // Carregar a VIEW
        return view('courses.show', ['course' => $course]);
        
    }
    
    // Carregar o formulário cadastrar novo curso
    public function create(){

        // Carregar a VIEW
        return view('courses.create');
        
    }
    
    // Cadastrar no banco de dados o novo curso
    public function store(Request $request){

        // Cadastrar no banco de dados na tabela cursos os valores de todos os campos
        // dd($request->name);
        Course::create([
            'name' => $request->name
        ]);
        
        // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('courses.create')->with('success', 'Curso cadastrado com sucesso!');
    }
    
    // Carregar o formulário editar curso
    public function edit(){

        // Carregar a VIEW
        return view('courses.edit');
        
    }
    
    // Editar no banco de dados o curso
    public function update(){

        dd("Editar no banco de dados o curso");
        
    }
    
    // Excluir o curso do banco de dados
    public function destroy(){

        dd("Excluir o curso do banco de dados");
        
    }
}
