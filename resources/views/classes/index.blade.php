@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4">
        <div class="mb-1 hstack gap-2">
            <h2 class="mt-3">Aulas</h2>

            <ol class="breadcrumb mb-3 mt-3 ms-auto">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard.index') }}" class="text-decoration-none">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('course.show', ['course' => $course->id]) }}" class="text-decoration-none">Curso</a>
                </li>
                <li class="breadcrumb-item active">Aulas</li>
            </ol>
        </div>

        <div class="card mb-4 border-light shadow">
            <div class="card-header hstack gap-2">
                <span>Listar</span>

                <span class="ms-auto">
                    {{-- Botão "Curso" - Visível para todos --}}
                    <a href="{{ route('course.show', ['course' => $course->id]) }}" class="btn btn-primary btn-sm">Curso</a>

                    {{-- Botão "Cadastrar" - Apenas Professores, Admins e Super Admins --}}
                    @if(auth()->user()->hasRole(['Professor', 'Admin', 'Super Admin']))
                        <a href="{{ route('classe.create', ['course' => $course->id]) }}" class="btn btn-success btn-sm">Cadastrar</a>
                    @endif
                </span>
            </div>

            <div class="card-body">
                <x-alert />

                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th class="d-none d-sm-table-cell">ID</th>
                            <th>Nome</th>
                            <th class="d-none d-md-table-cell">Ordem</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Listar as aulas --}}
                        @forelse ($classes as $classe)
                            <tr>
                                <th class="d-none d-sm-table-cell">{{ $classe->id }}</th>
                                <td>{{ $classe->name }}</td>
                                <td class="d-none d-md-table-cell">{{ $classe->order_classe }}</td>
                                <td class="d-md-flex flex-row justify-content-center">

                                    {{-- Botão "Visualizar" - Todos podem acessar --}}
                                    <a href="{{ route('classe.show', ['classe' => $classe->id]) }}" 
                                       class="btn btn-primary btn-sm me-1 mb-1 mb-md-0">
                                        Visualizar
                                    </a>

                                    {{-- Botão "Editar" - Apenas Tutores, Professores, Admins e Super Admins --}}
                                    @if(auth()->user()->hasRole(['Tutor', 'Professor', 'Admin', 'Super Admin']))
                                        <a href="{{ route('classe.edit', ['classe' => $classe->id]) }}" 
                                           class="btn btn-warning btn-sm me-1 mb-1 mb-md-0">
                                            Editar
                                        </a>
                                    @endif

                                    {{-- Botão "Apagar" - Apenas Professores, Admins e Super Admins --}}
                                    @if(auth()->user()->hasRole(['Professor', 'Admin', 'Super Admin']))
                                        <form action="{{ route('classe.destroy', ['classe' => $classe->id]) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm me-1"
                                                onclick="return confirm('Tem certeza que deseja apagar este registro?')">
                                                Apagar
                                            </button>
                                        </form>
                                    @endif

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-danger">Nenhuma aula encontrada!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
