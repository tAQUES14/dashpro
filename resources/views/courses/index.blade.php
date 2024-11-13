@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4">
        <div class="mb-1 hstack gap-2">
            <h2 class="mt-3">Curso</h2>

            <ol class="breadcrumb mb-3 mt-3 ms-auto">
                <li class="breadcrumb-item">
                    <a href="#" class="text-decoration-none">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Cursos</li>
            </ol>
        </div>

        <div class="card mb-4 border-light shadow">

            <div class="card-header hstack gap-2">
                <span>Listar</span>

                <span class="ms-auto">
                    <a href="{{ route('course.create') }}" class="btn btn-success btn-sm">Cadastrar</a>
                </span>
            </div>

            <div class="card-body">

                <x-alert />

                <table class="table table-striped table-hover ">
                    <thead>
                        <tr>
                            <th class="d-none d-sm-table-cell">ID</th>
                            <th>Nome</th>
                            <th class="d-none d-md-table-cell">Preço</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>

                    <tbody>

                        {{-- Imprimir os registros --}}
                        @forelse ($courses as $course)
                            <tr>
                                <th class="d-none d-sm-table-cell">{{ $course->id }}</th>
                                <td>{{ $course->name }}</td>
                                <td class="d-none d-md-table-cell">{{ 'R$ ' . number_format($course->price, 2, ',', '.') }}
                                </td>
                                <td class="d-md-flex flex-row justify-content-center">
                                    <a href="{{ route('classe.index', ['course' => $course->id]) }}"
                                        class="btn btn-info btn-sm me-1 mb-1 mb-md-0">Aulas</a>

                                    <a href="{{ route('course.show', ['course' => $course->id]) }}"
                                        class="btn btn-primary btn-sm me-1 mb-1 mb-md-0">Visualizar</a>

                                    <a href="{{ route('course.edit', ['course' => $course->id]) }}"
                                        class="btn btn-warning btn-sm me-1 mb-1 mb-md-0">Editar</a>

                                    <form action="{{ route('course.destroy', ['course' => $course->id]) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm me-1"
                                            onclick="return confirm('Tem certeza que deseja apagar este registro?')">Apagar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-danger" role="alert">
                                Nenhum curso encontrado!
                            </div>
                        @endforelse

                    </tbody>
                </table>

                {{-- Imprimir a paginação --}}
                {{ $courses->links() }}

            </div>
        </div>
    </div>
@endsection
