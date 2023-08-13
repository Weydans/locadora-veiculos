@extends('master')

@section('content')

<div class="d-flex justify-content-between mb-3 align-items-center">
    <h3 class="col-md-6">Usuários</h3>
    <a href="{{ route('users.create') }}">
        <button class="btn btn-sm btn-primary">Cadastrar</button>    
    </a>
</div>

<table class="table">
    <thead class="bg-dark">
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>CPF</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
    @forelse($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->document }}</td>
            <td>
                <div class="d-flex justify-content-start">
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-success me-2">
                        Editar
                    </a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')                    

                        <button href="" class="btn btn-sm btn-danger">
                            Remover
                        </button>
                    </form>
                </div>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5" class="py-4"><p class="text-center">Nenhum registro encontrado!</p></td>
        </tr>
    @endforelse
    </tbody>
</table>

@endsection
