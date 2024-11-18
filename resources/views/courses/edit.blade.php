@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4">
        <div class="mb-1 hstack gap-2">
            <h2 class="mt-3">Curso</h2>

            <ol class="breadcrumb mb-3 mt-3 ms-auto">
                <li class="breadcrumb-item">
                    <a href="{{ route('user.index') }}" class="text-decoration-none">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('course.index') }}" class="text-decoration-none">Cursos</a>
                </li>
                <li class="breadcrumb-item active">Curso</li>
            </ol>
        </div>

        <div class="card mb-4 border-light shadow">

            <div class="card-header hstack gap-2">
                <span>Editar</span>

                <span class="ms-auto d-sm-flex flex-row">
                    <a href="{{ route('course.index') }}" class="btn btn-info btn-sm me-1 mb-1 mb-sm-0">Listar</a>
                    <a href="{{ route('course.show', ['course' => $course->id]) }}"  class="btn btn-primary btn-sm me-1 mb-1 mb-sm-0">Visualizar</a>
                </span>
            </div>

            <div class="card-body">

                <x-alert />

                @can('edit-course') {{-- Apenas usuários com permissão "edit-course" podem acessar o formulário --}}
                    <form class="row g-3" action="{{ route('course.update', ['course' => $course->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="col-12">
                          <label for="name" class="form-label">Nome</label>
                          <input type="text" name="name" class="form-control" id="name" placeholder="Nome do curso" value="{{ old('name', $course->name) }}" required>
                        </div>

                        <div class="col-12">
                            <label for="price" class="form-label">Preço</label>
                            <input type="text" name="price" class="form-control" id="price"
                                placeholder="Preço do curso: 2.47. Usar '.' separar real do centavo"
                                value="{{ old('price', isset($course->price) ? number_format($course->price, '2', ',', '.') : '') }}"
                                required>
                        </div>

                        <div class="col-12">
                          <button type="submit" class="btn btn-warning btn-sm">Editar</button>
                        </div>

                    </form>
                @else
                    <div class="alert alert-warning">
                        Você não tem permissão para editar este curso.
                    </div>
                @endcan

            </div>
        </div>

    </div>
@endsection
