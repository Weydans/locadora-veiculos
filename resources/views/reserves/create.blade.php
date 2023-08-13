@extends('master')

@section('content')

	<div class="d-flex justify-content-between mb-3 align-items-center">
		<h3 class="col-md-6">Reservas</h3>
	</div>

	<h5 class="pb-3">{{ $car->brand }} {{ $car->model }} {{ $car->year }} ({{ $car->plate }})</h5>

	<form action="{{ route('reserves.store', $car->id) }}" method="POST">
		@csrf
		
		<div class="mb-3">
			<label for="date" class="form-label">Data</label>
			<input id="date" name="date" type="date" value="{{ old('date') }}" class="form-control">
		</div>

		<button type="submit" class="btn btn-primary">Cadastrar</button>
	</form>

@endsection
