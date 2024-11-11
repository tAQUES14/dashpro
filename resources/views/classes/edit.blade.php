@extends('layouts.admin')

@section('content')

    <h2>Editar Aula</h2>

    <a href="{{ route('classe.index', ['course' => $classe->course_id]) }}">
        <button type="button">Aulas</button>
    </a><br><br>

    <a href="{{ route('classe.show', ['classe' => $classe->id]) }}">
        <button type="button">Visualizar</button>
    </a><br><br>

    <x-alert />    

    {{-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis suscipit magnam amet. Consequatur animi odio vitae dolorum asperiores cum exercitationem quo nam quaerat fugiat non vero mollitia, iste culpa aut! --}}

    <form action="{{ route('classe.update', ['classe' => $classe->id ]) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label>Curso: </label>
        <input type="text" name="name_course" id="name_course" value="{{ $classe->course->name }}" disabled><br><br>

        <label>Nome: </label>
        <input type="text" name="name" id="name" placeholder="Nome da aula" value="{{ old('name', $classe->name) }}" required><br><br>

        <label>Descrição</label>
        <textarea name="description" id="description" rows="4" cols="30" required>{{ old('description', $classe->description) }}</textarea><br><br>

        <button type="submit">Editar</button>

    </form>
@endsection