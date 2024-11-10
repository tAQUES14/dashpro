@extends('layouts.admin')

@section('content')
    <h2>Editar o Curso</h2>

    <a href="{{ route('course.index') }}">
        <button type="button">Listar</button>
    </a><br><br>

    <a href="{{ route('course.show', ['course' => $course->id]) }}">
        <button type="button">Visualizar</button>
    </a><br><br>

    <x-alert />

    <form action="{{ route('course.update', ['course' => $course->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nome: </label>
        <input type="text" name="name" id="name" placeholder="Nome do curso" value="{{ old('name', $course->name) }}"
            ><br><br>

        <label>Preço: </label>
        <input type="text" name="price" id="price" placeholder="Preço do curso: 2.47"
            value="{{ old('price', $course->price) }}" ><br><br>

        <button type="submit">Salvar</button>

    </form>
@endsection
