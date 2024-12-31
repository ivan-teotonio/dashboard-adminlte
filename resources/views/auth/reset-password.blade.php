@extends('layouts.auth')

@section('body-class', 'register-page')

@section('content')

<div class="register-box">
      <div class="register-logo">
        <a href="{{ route('reset-password') }}"><b>Cadastre uma nova senha</b></a>
      </div>
      <div class="card">
        <div class="card-body register-card-body">
          <form action="{{ route('password.update') }}" method="post">
            @csrf
 
            <input type="hidden" name="token" value="{{ request()->token }}">
          
            <div class="input-group mb-3">
                <div class="input-group-text"><span class="bi bi-envelope"></span></div>
              <input value="{{ request()->email }}" type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" />
              @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="input-group mb-3">
                <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
              <input  type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Senha" />
              @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="input-group mb-3">
                <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
              <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirme a senha" />
              @error('password_confirmation')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="row justify-content-center">
             
              <div class="col-12">
                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-primary">Resetar senha</button>
                </div>
              </div>
            </div>
          </form>
        
        
        </div>
      </div>
</div>



@endsection