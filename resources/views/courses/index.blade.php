@extends('layouts.admin')

@section('content')
<h2>Listar Cursos</h2>

<a href="{{ route('courses.show') }}"> Visualizar </a><br>
<a href="{{ route('courses.create') }}"> Cadastrar </a>

@endsection

