
<div class="card">
  
	<form action="{{ route('users.update',$user->id) }}" method="POST">
		@csrf
		@method('PUT')

		<div class="card-header">
			<h3>Dados Básicos</h3>
		</div>

		<div class="card-body">

			<div class="form-group mb-3">
				<label for="name">Nome</label>
				<input 
				type="text" 
				name="name" 
				id="name" 
				class="form-control @error('name') is-invalid @enderror" 
				placeholder="Digite o nome"
				value="{{ old('name') ?? $user->name }}"
				>
				@error('name')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
				@enderror
			</div>

			
			<div class="form-group">
				<label for="email">Email</label>
				<input 
				type="email" 
				name="email" 
				id="email" 
				class="form-control @error('email') is-invalid @enderror mb-3" 
				placeholder="Digite o email"
				value="{{ old('email') ?? $user->email }}"
				>
				@error('email')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
				@enderror
			</div>

			<div class="form-group">
				<label for="password">Senha</label>
				<input 
				type="password" 
				name="password" 
				id="password" 
				class="form-control @error('password') is-invalid @enderror mb-3" 
				placeholder="Digite a senha"
				>
				@error('password')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
				@enderror
			</div>

		</div> 

		<div class="card-footer">
			<div class="form-group text-right">
				<button type="submit" class="btn btn-success">Editar</button>
				<a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
			</div>
		</div>
	</form>
</div>
