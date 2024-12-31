@extends('layouts.auth')

@section('body_class', 'login-page')

@section('content')

<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('login') }}"><b>Administrador</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Redefinir sua senha</p>

                <!-- Mensagem de erro -->
                @session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endsession

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Digite seu email" value="{{ old('email') }}" autofocus>
                        <div class="input-group-text"><span class="bi bi-envelope"></span></div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                       
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Enviar link de redefinição</button>
                            </div>
                        </div>
                    </div>
                </form>

                <p class="mt-3 mb-1">
                    <a href="{{ route('login') }}">Voltar para o login</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
</div>

@endsection
