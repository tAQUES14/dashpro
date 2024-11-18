@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4">
        <div class="mb-1 hstack gap-2">
            <h2 class="mt-3">Curso</h2>

            <ol class="breadcrumb mb-3 mt-3 ms-auto">
                <li class="breadcrumb-item">
                    <a href="{{ route('user.index') }}" class="text-decoration-none">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Curso</li>
            </ol>
        </div>

        <div class="card mb-4 border-light shadow">

            <div class="card-header hstack gap-2">
                <span>Visualizar</span>

                <span class="ms-auto d-sm-flex flex-row">
                    {{-- Permissão para visualizar aulas --}}
                    @can('view-classe')
                        <a href="{{ route('classe.index', ['course' => $course->id]) }}" class="btn btn-info btn-sm me-1 mb-1 mb-sm-0">Aulas</a>
                    @endcan

                    {{-- Permissão para listar cursos --}}
                    <a href="{{ route('course.index') }}" class="btn btn-info btn-sm me-1 mb-1 mb-sm-0">Listar</a>

                    {{-- Permissão para editar curso --}}
                    @can('edit-course')
                        <a href="{{ route('course.edit', ['course' => $course->id]) }}" class="btn btn-warning btn-sm me-1 mb-1 mb-sm-0">Editar</a>
                    @endcan

                    {{-- Permissão para apagar curso --}}
                    @can('destroy-course')
                        <form action="{{ route('course.destroy', ['course' => $course->id]) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Tem certeza que deseja apagar este registro?')">Apagar</button>
                        </form>
                    @endcan
                </span>
            </div>

            <div class="card-body">
                <x-alert />

                <dl class="row">
                    <dt class="col-sm-3">ID: </dt>
                    <dd class="col-sm-9">{{ $course->id }}</dd>

                    <dt class="col-sm-3">Nome: </dt>
                    <dd class="col-sm-9">{{ $course->name }}</dd>

                    <dt class="col-sm-3">Preço: </dt>
                    <dd class="col-sm-9">{{ 'R$ ' . number_format($course->price, 2, ',', '.') }}</dd>

                    <dt class="col-sm-3">Cadastrado: </dt>
                    <dd class="col-sm-9">{{ \Carbon\Carbon::parse($course->created_at)->format('d/m/Y H:i:s') }}</dd>

                    <dt class="col-sm-3">Editado: </dt>
                    <dd class="col-sm-9">{{ \Carbon\Carbon::parse($course->updated_at)->format('d/m/Y H:i:s') }}</dd>
                </dl>

            </div>
        </div>

    </div>
@endsection
