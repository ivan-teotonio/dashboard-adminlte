
<div class="card">
  
	<form action="{{ route('users.updateRole',$user->id) }}" method="POST">
		@csrf
		@method('PUT')

		<div class="card-header">
			<h3>Cargos</h3>
		</div>

		<div class="card-body">
		   
		@foreach($roles as $role)
				<div class="form-check">

					<input 
						class="form-check-input @error('roles') is-invalid @enderror" 
						type="checkbox" 
						value="{{ $role->id }}" 
						name="roles[]"
						@checked(in_array($role->name,$user->roles->pluck('name')->toArray()))
					>
					<label class="form-check-label" for="flexCheckChecked">
						{{ $role->name }}
					</label>
					@if($loop->last)
						@error('roles')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
						@enderror
					@endif
				</div>
			@endforeach  

		</div> 

		<div class="card-footer">
			<div class="form-group text-right">
				<button type="submit" class="btn btn-success">Editar</button>
				<a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
			</div>
		</div>
	</form>
</div>
