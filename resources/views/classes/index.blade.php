@extends('layouts.admin')

@section('content')

    <h2>Listar as Aulas</h2>

    <a href="{{ route('course.index') }}">
        <button type="button">Cursos</button>
    </a><br><br>

    <a href="{{ route('classe.create', ['course' => $course->id]) }}">
        <button type="button">Cadastrar</button>
    </a><br><br>

    <x-alert />

    @forelse ($classes as $classe)
        ID: {{ $classe->id }}<br>
        Nome: {{ $classe->name }}<br>
        Ordem: {{ $classe->order_classe }}<br>
        Descrição: {{ $classe->description }}<br>
        Curso: {{ $classe->course->name }}<br>
        Cadastrado: {{ \Carbon\Carbon::parse($classe->created_at)->format('d/m/Y H:i:s') }}<br>
        Editado: {{ \Carbon\Carbon::parse($classe->updated_at)->format('d/m/Y H:i:s') }}<br><br>

        <a href="{{ route('classe.show', ['classe' => $classe->id]) }}">
            <button type="button">Visualizar</button>
        </a><br><br>

        <a href="{{ route('classe.edit', ['classe' => $classe->id]) }}">
            <button type="button">Editar</button>
        </a><br><br>

        <form action="{{route('classe.destroy', ['classe' =>$classe->id])}}" method="POST">
            @csrf
            @method('delete')
             <button type="submit" onclick="return confirm('Tem certeza que deseja excluir esse registro?')">Apagar</button>
        </form>

        <hr>

    @empty
        <p style="color: #f00">Nenhuma aula encontrada!</p>
    @endforelse

@endsection