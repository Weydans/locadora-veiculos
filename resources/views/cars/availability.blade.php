@extends('master')

@section('content')

    <div class="d-flex justify-content-between mb-3 align-items-center">
        <h3 class="col-md-6">Automóveis</h3>
        <a href="{{ route('reserves.create', $car->id) }}">
            <button class="btn btn-sm btn-primary">Reservar</button>    
        </a>
    </div>

    <h5 class="pb-3">{{ $car->brand }} {{ $car->model }} {{ $car->year }} ({{ $car->plate }})</h5>
    
    <form class="pb-4" action="" method="GET">
        <div class="mb-3">
            <label class="form-label" for="">Filtro de mês</label>
            <input value="{{ $month }}" name="month" type="number" min="1" max="12" class="form-control">
        </div>
        
        <div class="mb-3">
            <label class="form-label" for="">Filtro de ano</label>
            <input value="{{ $year }}" name="year" type="number" class="form-control">
        </div>

        <button class="btn btn-primary">Buscar</button>
    </form>    

    <table class="table">
        <thead class="bg-dark">
            <tr>
                <th>Data</th>
                <th>Reservante</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach($availabilities as $availability)
            <tr>
                <td>{{ date('d/m/Y', strtotime($availability->date)) }}</td>
                <td>{{ $availability->user ?? '-' }}</td>
                <td class="text-{{ $availability->user ? 'danger' : 'success' }}">
                    {{ $availability->user ? 'Reservado' : 'Disponível' }}
                </td>
                <td>
                @if( !$availability->user )
                    <form action="{{ route('reserves.store', $car->id) }}" method="POST">
                        @csrf
                        <input id="date" name="date" type="hidden" value="{{ $availability->date }}" class="form-control">
                        <button type="submit" class="btn btn-sm btn-primary">Reservar</button>
                    </form>
                @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
