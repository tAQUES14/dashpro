@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4">
        <div class="mb-1 hstack gap-2">
            <h2 class="mt-3">Usuário</h2>
            <ol class="breadcrumb mb-3 mt-3 ms-auto">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard.index') }}" class="text-decoration-none">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Usuários</li>
            </ol>
        </div>

        <div class="card mb-4 border-light shadow">
            <div class="card-header hstack gap-2">
                <span>Listar</span>
                <span class="ms-auto">
                    {{-- Apenas quem pode criar usuários verá este botão --}}
                    @can('create-user')
                        <a href="{{ route('user.create') }}" class="btn btn-success btn-sm">
                            <i class="fa-regular fa-square-plus"></i> Cadastrar
                        </a>
                    @endcan
                </span>
            </div>
            <div class="card-body">

                <x-alert />

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th class="d-none d-md-table-cell">E-mail</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <th>{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td class="d-none d-md-table-cell">{{ $user->email }}</td>
                                <td class="d-md-flex flex-row justify-content-center">

                                    {{-- Botão de Visualizar - Todos podem visualizar --}}
                                    <a href="{{ route('user.show', ['user' => $user->id]) }}"
                                        class="btn btn-primary btn-sm me-1 mb-1">
                                        <i class="fa-regular fa-eye"></i> Visualizar
                                    </a>

                                    {{-- Botão de Editar - Professores, Admins e Super Admins --}}
                                    @if(auth()->user()->hasRole(['Professor', 'Admin', 'Super Admin']))
                                        <a href="{{ route('user.edit', ['user' => $user->id]) }}"
                                            class="btn btn-warning btn-sm me-1 mb-1">
                                            <i class="fa-solid fa-pen-to-square"></i> Editar
                                        </a>
                                    @endif

                                    {{-- Botão de Apagar - Apenas Admins e Super Admins --}}
                                    @if(auth()->user()->hasRole(['Admin', 'Super Admin']))
                                        <form method="POST" action="{{ route('user.destroy', ['user' => $user->id]) }}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm me-1 mb-1"
                                                onclick="return confirm('Tem certeza que deseja apagar este registro?')">
                                                <i class="fa-regular fa-trash-can"></i> Apagar
                                            </button>
                                        </form>
                                    @endif

                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-danger" role="alert">Nenhum usuário encontrado!</div>
                        @endforelse
                    </tbody>
                </table>

                {{-- Paginação --}}

            </div>
        </div>
    </div>
@endsection
