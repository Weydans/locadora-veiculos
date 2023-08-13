@extends('master')

@section('content')

<div class="d-flex justify-content-between mb-3 align-items-center">
    <h3 class="col-md-6">Automóveis</h3>
    <a href="{{ route('cars.create') }}">
        <button class="btn btn-sm btn-primary">Cadastrar</button>    
    </a>
</div>

<table class="table">
    <thead class="bg-dark">
        <tr>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Ano</th>
            <th>Placa</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
    @forelse($cars as $car)
        <tr>
            <td>{{ $car->brand }}</td>
            <td>{{ $car->model }}</td>
            <td>{{ $car->year }}</td>
            <td>{{ $car->plate }}</td>
            <td>
                <div class="d-flex justify-content-start">
                    <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-sm btn-success me-2">
                        Editar
                    </a>
                    <form action="{{ route('cars.destroy', $car->id) }}" method="POST">
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
