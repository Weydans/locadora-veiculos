@extends('master')

@section('content')

	<div class="d-flex justify-content-between mb-3 align-items-center">
		<h3 class="col-md-6">Usuários</h3>
	</div>

	<form action="{{ route('users.update', $user->id) }}" method="POST">
		@csrf
		@method('PUT')
		
		<div class="mb-3">
			<label for="name" class="form-label">Nome</label>
			<input id="name" name="name" type="text" value="{{ old('name') ?? $user->name }}" class="form-control">
		</div>

		<div class="mb-3">
			<label for="email" class="form-label">E-mail</label>
			<input id="email" name="email" type="text" value="{{ old('email') ?? $user->email }}" class="form-control">
		</div>

		<div class="mb-3">
			<label for="document" class="form-label">CPF</label>
			<input id="document" name="document" type="text" value="{{ old('document') ?? $user->document }}" class="form-control">
		</div>

		<div class="mb-3">
			<label for="password" class="form-label">Senha</label>
			<input id="password" name="password" type="password" value="" class="form-control">
		</div>

		<div class="mb-3">
			<label for="confirm_password" class="form-label">Confirmar senha</label>
			<input id="confirm_password" name="confirm_password" type="password" value="" class="form-control">
		</div>

		<button type="submit" class="btn btn-primary">Atualizar</button>
	</form>

@endsection
