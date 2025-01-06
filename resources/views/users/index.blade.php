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
  <!-- /.card-header -->
  <div class="card-body table-responsive p-0">
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
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

   
@endsection
