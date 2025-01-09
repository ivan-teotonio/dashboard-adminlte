@extends('layouts.default')

@section('page-title','Usuários')

@section('page-actions')
<a href="{{ route('users.create') }}" class="btn btn-primary">
    <i class="fas fa-plus"></i> Adicionar Usuário
</a>
@endsection

@section('content')

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Título da Tabela</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>


  @session('status')
    <div class="alert alert-success">
      {{ $value }}
    </div>
  @endsession

  @can('destroy', \App\Models\User::class)
    Posso deletar
  @endcan


  <form action="{{ route('users.index') }}" method="GET" style="width: 300px;">
    <div class="input-group mb-3 input-group-sm">
      <input type="text" 
      name="keywords" 
      class="form-control" 
      placeholder="Pesquisar por nome ou email"
      value="{{ request()?->keywords }}"
      >
      <button type="submit" class="btn btn-primary">Pesquisar</button>
    </div>
  </form> 


    <table class="table table-hover text-nowrap">
      <thead>
        <tr>
          <th>#</th>
          <th>Nome</th>
          <th>Email</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>
            <a href="{{ route('users.edit',$user->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Editar</a>
            <form action="{{ route('users.destroy',$user->id) }}" method="POST" style="display: inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm">
                <i class="fas fa-trash"></i> Excluir
              </button>
            </form>
          </td>
        </tr>
        @endforeach

        
       {{ $users->links() }}
      </tbody>
    </table>

    <div class="d-flex justify-content-center">
       
    </div>
    
  </div>
 
</div>

   
@endsection
