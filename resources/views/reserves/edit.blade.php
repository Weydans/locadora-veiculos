@extends('master')

@section('content')

	<div class="d-flex justify-content-between mb-3 align-items-center">
		<h3 class="col-md-6">Reservas</h3>
	</div>

	<h5 class="pb-3">{{ $reserve->car->brand }} {{ $reserve->car->model }} {{ $reserve->car->year }} ({{ $reserve->car->plate }})</h5>

	<form action="{{ route('reserves.update', $reserve->id) }}" method="POST">
		@csrf
		@method('PUT')
		
		<div class="mb-3">
			<label for="date" class="form-label">Data</label>
			<input id="date" name="date" type="date" value="{{ old('date') ?? $reserve->date }}" class="form-control">
		</div>

		<button type="submit" class="btn btn-primary">Atualizar</button>
	</form>

@endsection
