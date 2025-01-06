
<div class="card">
  
	<form action="{{ route('users.updateInterest',$user->id) }}" method="POST">
		@csrf
		@method('PUT')

		<div class="card-header">
			<h3>Interesses</h3>
		</div>

		<div class="card-body">
		   
		@foreach(['Futebol','Basqueta'] as $item)
				<div class="form-check">
					<input 
						class="form-check-input @error('interests') is-invalid @enderror" 
						type="checkbox" 
						value="{{ $item }}" 
						name="interests[][name]"
						@checked(in_array($item,$user->interests->pluck('name')->toArray()))
					>
					<label class="form-check-label" for="flexCheckChecked">
						{{ $item }}
					</label>
					@if($loop->last)
						@error('interests')
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
