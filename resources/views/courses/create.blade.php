@extends('layouts.admin')

@section('content')
<h2>Cadastrar o Curso</h2>

<a href="{{ route('courses.index') }}"> Listar </a> <br>
<a href="{{ route('courses.create') }}"> Cadastrar </a>

@endsection
