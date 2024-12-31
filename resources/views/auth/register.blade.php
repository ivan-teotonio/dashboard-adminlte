@extends('layouts.auth')

@section('body-class', 'register-page')

@section('content')

<div class="register-box">
      <div class="register-logo">
        <a href="{{ route('register') }}"><b>Cadastre-se</b></a>
      </div>
      <!-- /.register-logo -->
      <div class="card">
        <div class="card-body register-card-body">
          <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="input-group mb-3">
            <div class="input-group-text"><span class="bi bi-person"></span></div>
              <input value="{{ old('name') }}" type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nome completo" />
              @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="input-group mb-3">
                <div class="input-group-text"><span class="bi bi-envelope"></span></div>
              <input value="{{ old('email') }}" type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" />
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
            <!--begin::Row-->
            <div class="row justify-content-center">
             
              <!-- /.col -->
              <div class="col-12">
                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!--end::Row-->
          </form>
        
          <!-- /.social-auth-links -->
          <p class="mb-0">
            <a href="{{ route('login') }}" class="text-center">Eu já tenho uma conta</a>
          </p>
        </div>
        <!-- /.register-card-body -->
      </div>
</div>



@endsection