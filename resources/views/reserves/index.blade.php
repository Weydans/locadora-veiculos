@extends('master')

@section('content')

	<div class="d-flex justify-content-between mb-3 align-items-center">
			<h3 class="col-md-6">Reservas</h3>
	</div>

	<table class="table">
			<thead class="bg-dark">
					<tr>
							<th>Data</th>
							<th>Reservante</th>
							<th>Marca</th>
							<th>Modelo</th>
							<th>Ano</th>
							<th>Placa</th>
							<th>Ações</th>
					</tr>
			</thead>
			<tbody>
			@forelse($reserves as $reserve)
					<tr>
							<td>{{ date('d/m/Y', strtotime($reserve->date)); }}</td>
							<td>{{ $reserve->user->name }}</td>
							<td>{{ $reserve->car->brand }}</td>
							<td>{{ $reserve->car->model }}</td>
							<td>{{ $reserve->car->year }}</td>
							<td>{{ $reserve->car->plate }}</td>
							<td>
									<div class="d-flex justify-content-start">
											<a href="{{ route('reserves.edit', $reserve->id) }}" class="btn btn-sm btn-success me-2">
													Editar
											</a>
											<form action="{{ route('reserves.destroy', $reserve->id) }}" method="POST">
													@csrf
													@method('DELETE')                    

													<button href="" class="btn btn-sm btn-danger me-2">
															Remover
													</button>
											</form>
									</div>
							</td>
					</tr>
			@empty
					<tr>
							<td colspan="7" class="py-4"><p class="text-center">Nenhum registro encontrado!</p></td>
					</tr>
			@endforelse
			</tbody>
	</table>

@endsection
