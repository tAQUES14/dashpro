@extends('layouts.admin')

@section('content')
<h2>Detalhes do Curso</h2>

<a href="{{ route('courses.index') }}"> Listar </a> <br>
<a href="{{ route('courses.create') }}"> Cadastrar </a>

@endsection
