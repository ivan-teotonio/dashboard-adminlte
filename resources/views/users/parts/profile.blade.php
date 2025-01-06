
<div class="card">
  
	<form action="{{ route('users.updateProfile',$user->id) }}" method="POST">
		@csrf
		@method('PUT')

		<div class="card-header">
			<h3>Perfil</h3>
		</div>

		<div class="card-body">

			<div class="form-group mb-3">
				<label for="type">Tipo de Pessoa</label>
				<select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
				    @foreach(['F','J'] as $type)
						<option value="{{ $type }}" {{ $user->profile?->type == $type ? 'selected' : '' }}>
							{{ $type == 'F' ? 'Física' : 'Jurídica' }}
						</option>
				    @endforeach
				</select>
				@error('type')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
				@enderror
			</div>

			
			<div class="form-group">
				<label for="address">Endereço</label>
				<input 
				type="text" 
				name="address" 
				id="address" 
				class="form-control @error('address') is-invalid @enderror mb-3" 
				placeholder="Digite o endereço"
				value="{{ old('address') ?? $user?->profile?->address }}"
				>
				@error('address')
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
