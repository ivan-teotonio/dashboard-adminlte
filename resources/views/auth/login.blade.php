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
                <p class="login-box-msg">Faça login para iniciar sua sessão</p>

                @session('status')
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endsession

                <form action="{{ route('login') }}" method="post">
                    @csrf
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
                        <input  type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" />
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-12">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Entrar</button>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!--end::Row-->
                </form>
                <!-- /.social-auth-links -->
             
                <div class="text-center mt-3">
                    <p class="mb-1"><a href="{{ route('password.request') }}">Esqueceu sua senha?</a></p>
                    <p class="mb-0"><a href="{{ route('register') }}" class="text-center">Cadastre-se</a></p>
                </div>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
</div>

@endsection
