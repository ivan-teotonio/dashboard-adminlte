@extends('layouts.default')

@section('page-title','Adicionar Usuário')

@section('content')

<div class="card">
  
  <!-- /.card-header -->
  <div class="card-body">
    <form action="{{ route('users.store') }}" method="POST">
      @csrf
      <div class="form-group mb-3">
        <label for="name">Nome</label>
        <input 
        type="text" 
        name="name" 
        id="name" 
        class="form-control @error('name') is-invalid @enderror" 
        placeholder="Digite o nome"
        value="{{ old('name') }}"
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
        value="{{ old('email') }}"
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
     
      <div class="form-group text-right">
        <button type="submit" class="btn btn-success">Adicionar</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
      </div>
    </form>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->


@endsection