@extends('master')

@section('content')

<div class="d-flex justify-content-between mb-3 align-items-center">
    <h3 class="col-md-6">Veículos</h3>
</div>

<form action="{{ route('cars.update', $car->id ) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="mb-3">
        <label for="brand" class="form-label">Marca</label>
        <input id="brand" name="brand" type="text" value="{{ old('brand') ?? $car->brand }}" class="form-control">
    </div>

    <div class="mb-3">
        <label for="model" class="form-label">Modelo</label>
        <input id="model" name="model" type="text" value="{{ old('model') ?? $car->model }}" class="form-control">
    </div>

    <div class="mb-3">
        <label for="year" class="form-label">Ano</label>
        <input id="year" name="year" type="text" value="{{ old('year') ?? $car->year }}" class="form-control">
    </div>

    <div class="mb-3">
        <label for="plate" class="form-label">Placa</label>
        <input id="plate" name="plate" type="text" value="{{ old('plate') ?? $car->plate }}" class="form-control">
    </div>

    <button type="submit" class="btn btn-sm btn-primary">Atualizar</button>
</form>

@endsection
